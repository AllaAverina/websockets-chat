<template>
    <ul class="list-group list-group-flush">
        <li class="list-group-item" v-for="message in messages" :key="message.id">
            <div class="clearfix">
                <div class="row">
                    <div class="col text-start">
                        <strong class="text-end">{{ message.user.name }}</strong>
                    </div>
                    <div class="col text-end">
                        <small class="text-muted">{{ getDateTime(message) }}</small>
                    </div>
                </div>
                <p class="my-0">{{ message.message }}</p>
            </div>
        </li>
    </ul>
</template>

<script>
import moment from 'moment';

export default {
    props: ["messages"],
    methods: {
        getDateTime(message) {
            return moment(message.created_at).format("HH:mm DD.MM.YYYY");
        },
    }
}
</script>
