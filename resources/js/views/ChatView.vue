<template>
    <div>
        <Section></Section>
        <main id="page-content">
            <div class="container top-head">
                <div class="row header-wrap">
                    <breadcrumb></breadcrumb>
                </div>
                <div class="page-header d-flex">
                    <div class="heading-wrapper">
                        <h2 class="main-heading main-heading--1" id="page-heading">
                         {{$t("chat.start")}}
                        </h2>
                        <div class="line divition-line"></div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row message-container">
                    <div class="col-lg-4 col-12 paddingRight">
                        <div id="friendslist">
                            <div class="w-100" id="search">
                                <label class="sr-only" for="searchFriend"></label>
                                <input id="searchFriend" placeholder="search" type="text"/>
                            </div>

                            <div class="w-100" id="friends">
                                <ul class="people">
                                    <li  v-for="person of persons" v-if="person.receiver.id !== authUser.id" @click.prevent="showChat(person.receiver.id)"
                                        class="person" data-chat="person1">
                                        <router-link :to="{ name: 'chat', params:  { id: person.receiver_id } }">
                                            <span class="avatar">
                                            <img width="50" alt="friend img" :src="person.receiver.imgUrl"/>
                                        </span>
                                            <span class="info">
                                            <span class="friend-name">@{{ person.receiver.name }}</span>
                                            <span class="friend-email">{{ person.receiver.email }} </span>
                                        </span>
                                            <span class="friend-time">{{person.updated_at}}</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 paddingHor">
                        <div class="p1" id="chatview">
                            <div v-if="receiver" id="profile">
                                <div class="chat-avatar">
                                    <img width="50" :src="authUser.imgUrl" alt="avatar">
                                </div>
                                <div class="chat-header">
                                    <a  class="custom-link"><span class="chat-userName">@{{ authUser.name }}</span></a>
                                    <span class="active-status">{{$t("chat.time")}}</span>
                                </div>
                            </div>
                            <div id="chat-messages" class="" style="overflow-y: scroll;height: 422px;">
                                <div class="text-center msg-time">
                                    <small>30 s ago</small>
                                </div>

                                <div v-for="message of chat" class="message" v-bind:class="{ reserved: message.user_id !== authUser.id }">
                                    <div v-if="message.user_id == authUser.id" class="message-img">
                                        <img width="50" :src="authUser.imgUrl" alt="avatar">
                                    </div>
                                    <div class="bubble" v-if="">
                                        <span>{{ message.message }}</span>
                                        <div class="corner"></div>
                                    </div>
                                </div>
                            </div>

                            <div id="sendMessage">
                                <label for="sendMsg" class="sr-only"></label>
                                <input v-model="message" type="text" id="sendMsg" placeholder="Type a message here"/>
                                <a @click.preventDefault="send" class="write-link send">
                                    <i class="far fa-paper-plane send"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    import axios from 'axios';
    import Echo from 'laravel-echo'
    import Pusher from 'pusher-js'
    import Section from "../components/Section";
    import Breadcrumb from "../components/Breadcrumb";

    export default  {
        name: 'ChatView',
        components:{Section,Breadcrumb},
        data: function () {
            return {
                authUser: '',
                message: '',
                persons: [],
                receiver: '',
                chat: [],
                activeFriend:'',
                onlineFriends:null,
                typingFriend:{},
            }
        },
        beforeMount: function() {
            axios.post('/api/messages/' + this.$route.params.id, {
                },
                {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                this.chat.push(res.data.data);
            }).catch(err => {
            });
        },
        mounted: function() {
            this.getCurrent();
            this.listChats();
            this.echoChat();

        },
        methods: {
            echoChat(){
                Echo.join('mery')
                    .here((users) => {
                        console.log('online',users);
                        this.onlineFriends=users;
                    })
                    .joining((user) => {
                        this.onlineFriends.push(user);
                        console.log('joining',user.name);
                    })
                    .leaving((user) => {
                        this.onlineFriends.splice(this.onlineFriends.indexOf(user),1);
                        console.log('leaving',user.name);
                    });

                Echo.private('mery.'+this.user.id)
                    .listen('mery',(e)=>{
                        console.log('pmessage sent')
                        this.activeFriend=e.message.user_id;
                        this.allMessages.push(e.message)
                        setTimeout(this.scrollToEnd,100);
                    })
                    .listenForWhisper('mery', (e) => {
                        if(e.user.id==this.activeFriend){
                            this.typingFriend=e.user;

                            if(this.typingClock) clearTimeout();
                            this.typingClock=setTimeout(()=>{
                                this.typingFriend={};
                            },9000);
                        }

                    });
            },
            getReceiver() {
                axios.get('/api/employer/worker/'+ this.receiver,{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(
                    res => {
                        this.receiver = res.data.data.id;
                    }
                )
            },
            getCurrent() {
                axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.authUser = res.data;
                })
            },
            send: function () {
                axios.post('/api/messages/' + this.receiver, {
                        message: this.message,
                    },
                    {
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    }).then(res => {
                    this.chat.push(res.data.data);
                    this.message = ''
                }).catch(err => {
                    console.log('err', err);
                });
            },
            listChats: function () {
                axios.get('/api/messages', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.persons = res.data.data;
                })
            },
            showChat(id) {
                this.receiver = id;
                this.getReceiver();
                axios.get('/api/messages/' + id, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(res => {
                    this.chat = res.data.data;
                    setTimeout(this.scrollToEnd,100);

                })
            }
        }
    }
</script>

<style scoped>
    div.paddingRight {
        padding-right: 10px !important;
        padding-top: 5px !important;
        background: #f5f5f5;
    }
    #chatview #sendMessage{
        padding: 1.187rem 2rem !important;
    }
    #chatview{
        margin-bottom: 11% !important;

    }
    .write-link .send{
        padding: 1% 0 0 0.5%;
        background: #ea3f66 none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: auto;
        top: 30px;
        width: 33px;
        left: auto;
    }
</style>
