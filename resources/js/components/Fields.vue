<template>
    <div class="mt-5">
       <div class="card mb-5">
            <div class="card-header">
              We'll call you back!
            </div>
            <div class="card-body">
                 <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control form-control-lg" placeholder="Enter name" v-model="name">
                    <div>
                    <p class='text-danger'>{{ nameInfo }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" class="form-control form-control-lg" placeholder="Enter phone"  v-model="phone">
                    <p class='text-danger'>{{ phoneInfo }}</p>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" rows="3" class="form-control" v-model="message"></textarea>
                     <p class='text-danger'>{{ messageInfo }}</p>
                </div>

                <p v-bind:class="[isActive]" >Your message has been sent, submit next message!</p>

                <button v-on:click = "sendData" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                phone: '',
                message: '',
                nameInfo: '',
                phoneInfo: '',
                messageInfo: '',
                isActive: 'd-none'
            }
        },

        methods: {
            succsess: function() {
                
                this.isActive = 
                this.name = 
                this.phone = 
                this.message = 
                this.nameInfo = 
                this.phoneInfo =
                this.messageInfo = '';

                let that = this;
                setTimeout(function(){
                    that.isActive = 'd-none';
                }, 4000);
            }, 

            displayErrors: function(errors) {
                let messages = JSON.parse(errors);
                
                this.nameInfo = (messages.name) ? messages.name[0] : '';
                this.phoneInfo = (messages.phone) ? messages.phone[0] : '';
                this.messageInfo = (messages.message) ? messages.message[0] : '';
            },

            sendData: function () {
                let hr = new XMLHttpRequest();
                let that = this;
                let url = "/message";
                let vars = "name=" + this.name + "&phone=" + this.phone + "&message=" + this.message;
                hr.open("POST", url, true);
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                hr.setRequestHeader('X-CSRF-TOKEN', window.Laravel.csrfToken);
                hr.onreadystatechange = function() {
                    let return_data = hr.responseText;
                    if(hr.readyState == 4 && hr.status == 200) {
                        if (return_data == 'done') {
                            that.succsess();
                        } else {
                            that.displayErrors(return_data);
                        }
                    }
                }
                hr.send(vars);
            },
        }
    }

</script>

