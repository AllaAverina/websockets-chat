import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';

import ChatMessages from './components/ChatMessages.vue';
import ChatForm from './components/ChatForm.vue';
import ThemeSwitcher from './components/ThemeSwitcher.vue';

createApp({
    data() {
        return {
            chatbox: null,
            messages: [],
        }
    },
    components: {
        'chat-messages': ChatMessages,
        'chat-form': ChatForm,
        'theme-switcher': ThemeSwitcher,
    },
    created() {
        this.fetchMessages();
        window.Echo.private('chat')
            .listen('MessageSent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            });
    },
    mounted() {
        this.chatbox = document.getElementById("chatbox");
    },
    watch: {
        messages: {
            handler() {
                setTimeout(() => {
                    this.chatbox.scrollTo({
                        top: this.chatbox.scrollHeight,
                        behavior: 'smooth'
                    });
                }, 100);
            },
            deep: true
        },
    },
    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },
        addMessage(message) {
            if (message.message) {
                axios.post('/messages', message).then(response => {
                    this.messages.push(message);
                });
            }
        },
    }
}).mount('#app');
