<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="from-group">
                    <textarea rows="6" readonly="" class="form-control">{{ dataMessage.join('\n')}}</textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="введите сообщение.." v-model="message">
                    <div class="input group-append">
                        <button @click="sendMessage" class="btn btn-success">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                dataMessage: [],
                message: "",
            }
        },
        mounted() {
            const socket = io.connect('http://io.siliconrus.ru:2096');

            socket.on("new-action:App\\Events\\SocketMessage", function (data) {
                //console.log(data)
               this.dataMessage.push(data.message)


            }.bind(this));
            console.log('Component mounted.')
        },
        methods: {
            sendMessage: function () {
                axios({
                    method: 'get',
                    url: '/chat/send-message',
                    params: { message: this.message }
                })
                .then((response) => {
                    this.message = ""
                }).catch(error => console.error(error))
            }
        }
    }
</script>
