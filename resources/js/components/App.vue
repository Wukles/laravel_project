<template>
    <div v-show="this.msg != null" class="alert alert-primary mt-2" role="alert">
        Добавлена новая статья <strong>{{this.msg}}</strong>
    </div>
</template>
<script>

    export default {
    data() { return { msg: null } },
        created() {
            window.Echo.channel('my-channel').listen('ArticleEvent', (data) => {
                console.log(data);
                this.msg=data.title;
                // alert('Добавлена новая статья!');
            })
        }
    }
</script>
