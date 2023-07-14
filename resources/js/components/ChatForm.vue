<template>
    <div class="input-group">
        <input type="text" id="btn-input" name="message" class="form-control"
            placeholder="Type your message" v-model="newMessage" @keyup.enter="sendMessage">

        <button id="btn-chat" class="btn btn-secondary" @click="sendMessage">Send</button>
    </div>
</template>

<script>
export default {
    props: ["user"],
    data() {
        return {
            newMessage: "",
        };
    },
    methods: {
        sendMessage() {
            this.$emit("messagesent", {
                user: this.user,
                message: this.newMessage,
            });
            this.newMessage = "";
        },
    },
};
</script>
