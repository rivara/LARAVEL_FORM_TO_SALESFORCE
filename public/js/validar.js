/*$.validator.setDefaults({
    submitHandler: function() {
        alert("submitted!");
    }
});*/


$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    },
    "Please check your input."
);




$().ready(function() {


    // validate signup form on keyup and submit
    $("#form").validate({
        lang: 'en',
       rules: {
            companyName: {
                minlength: 2
            },

            companyWeb: {
                minlength: 2
            },

            Linkedin: {
                minlength: 5
            },

            name: {
                minlength: 2
            },

            position: {
                minlength: 2
            },
            email: {
                regex : /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/,
                minlength: 6
            },
            phone: {
                regex : /^[+][0-9]*[\s]?$/,
                minlength: 6
            },
            mobile: {
                regex : /^[+][0-9]*[\s]?$/,
                minlength: 6
            },


            postalAddress: {
                regex : /^[0-9]*[\s]?$/,
                minlength: 4
            },

            companySize: {
                regex : /^[0-9]*[\s]?$/,
                minlength: 1
            },

            averageClientsSize:{
                regex : /^[0-9]*[\s]?$/,
                minlength: 1
            },

        },
        messages: {
            phone:{
                regex:"+31666777888 format"
            },
            mobile:{
                regex:"+31666777888 format"
            },
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },


        }
    });


});
