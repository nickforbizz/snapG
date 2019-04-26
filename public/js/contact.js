var vm = new Vue({
    el: '#vuecontact',
    data: {
        submitted: false,
        hide: true,
    },
    methods: {
        thankyouNote: function(){
            this.submitted = true;
            this.hide = false;
        },						
        releaseThankyouNote: function(){
            this.submitted  = false;
            this.hide  = true;
        }
    }
})

$("#contactForm").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        url: '../../private/post_data/contact.php',
        method: 'post',
        processData: false,
        contentType: false,
        data: new FormData(this),
        success: function (data) {
            $("#contactForm")[0].reset(); 
            vm.thankyouNote();
            // console.log(data);
            
        },
        error: function (data) {
            console.log(data);
            
        }
    })

})