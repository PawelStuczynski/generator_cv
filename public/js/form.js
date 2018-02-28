// Vue.config.devtools = true;

form_id = new Vue({
    el: '#form_id',
    data: {
        education: {
            school: '',
            school_begin: '',
            school_ended:'',
            school_information:''
        },
        educations: [],

        employer: {
            corporation: '',
            corporation_begin: '',
            corporation_ended: '',
            corporation_information:''
        },
        employers: [],

        language: {
            nationality:'',
            level:''
        },
        languages:[],

        image: '',
        name:'',
        surname:'',
        phone:'',
        email:'',
        adress:'',
        zipcode:'',
        city:'',
        birthdate:'',
        additional_abilities:'',
        interests:'',
        agreement:false,
        error_validated:[]


        // preview_avatar: '<img src="{{URL::asset(\'img/avatar_preview.png\')}}" width="10%">',
    },

    methods: {
        addNewEducation: function () {
            this.educations.push(Vue.util.extend({}, this.education))
        },
        removeEducation: function (index1) {
            Vue.delete(this.educations, index1);
        },
        addNewEmployer: function () {
            this.employers.push(Vue.util.extend({}, this.employer))
        },
        removeEmployer: function (index2) {
            Vue.delete(this.employers, index2);
        },
        addNewLanguage: function () {
            this.languages.push(Vue.util.extend({}, this.language))
        },
        removeLanguage: function (index3) {
            Vue.delete(this.languages, index3);
        },

        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            var image = new Image();
            var reader = new FileReader();
           // var formData = new formData;
            var vm = this;

            reader.onload = (e) => {
                vm.image = e.target.result;


            };
           // formData.append(file,image);
            reader.readAsDataURL(file);
        },
        removeImage: function (e) {
            this.image = '';
        },

        sendForm: function(event){

            event.preventDefault();


            var error_validate=true;
            //Input image walidacja
            if(this.image==''){
                document.getElementById('image_id').className += ' agreement_class ';
            }
            else {
            }
            //Input name walidacja
            if(this.name==''){
                document.getElementById('name_id').className += ' is-invalid ';
            }
            else {
                document.getElementById('name_id').classList.remove('is-invalid');
            }
            //Input surname walidacja
            if(this.surname==''){
                document.getElementById('surname_id').className += ' is-invalid ';
            }
            else {
                document.getElementById('surname_id').classList.remove('is-invalid');
            }
            //Input phone walidacja
            if(this.phone==''){
                document.getElementById('phone_id').className += ' is-invalid ';
            }
            else {
                document.getElementById('phone_id').classList.remove('is-invalid');
            }
            //Input email walidacja
            if(this.email==''){
                document.getElementById('email_id').className += ' is-invalid ';
            }
            else {
                document.getElementById('email_id').classList.remove('is-invalid');
            }
            //Input adress walidacja
            if(this.adress==''){
                document.getElementById('adress_id').className += ' is-invalid ';
            }
            else {
                document.getElementById('adress_id').classList.remove('is-invalid');
            }
            //Input zipcode walidacja
            if(this.zipcode==''){
                document.getElementById('zipcode_id').className += ' is-invalid ';
            }
            else {
                document.getElementById('zipcode_id').classList.remove('is-invalid');
            }
            //Input city walidacja
            if(this.city==''){
                document.getElementById('city_id').className += ' is-invalid ';
            }
            else {
                document.getElementById('city_id').classList.remove('is-invalid');
            }
            //Input birthdate walidacja
            if(this.birthdate==''){
                document.getElementById('birthdate_id').className += ' is-invalid ';
            }
            else {
                document.getElementById('birthdate_id').classList.remove('is-invalid');
            }
            //Input agreement walidacja
            if(this.agreement==false){
                document.getElementById('agreement_id').className += ' agreement_class ';
            }
            else {
                document.getElementById('agreement_id').classList.remove('agreement_class');
            }

            //Wysyłanie
            if(this.image!='' && this.name!='' && this.surname!='' && this.phone!='' && this.email!='' && this.adress!='' && this.zipcode!='' && this.city!='' && this.birthdate!='' && this.agreement==true ){

                 axios.post('/generator_cv/generator/public/save',{
                   //  image:this.image,
                     name:this.name,
                     surname:this.surname,
                     phone:this.phone,
                     email:this.email,
                     adress:this.adress,
                     zipcode:this.zipcode,
                     city:this.city,
                     birthdate:this.birthdate,
                     educations:this.educations,
                     employers:this.employers,
                     languages:this.languages,
                     additional_abilities:this.additional_abilities,
                     interests:this.interests

                })
                .then(function (response) {
                     console.log(response);
                 })
                     .catch(function (error) {
                         console.log(error);
                     });
            }
            else{
                alert('Wypełnij dane');
            }
               // && this.surname!='' && this.phone!='' && this.email!='' && this.image!='' && this.adress!='' && this.zipcode!='' && !this.city && !this.birthdate && !this.additional_abilities && !this.interests && !this.agreement && this.education && !this.employer && !this.language) {

              //  alert('Wypełnij wszystkie pola');
           // }

        }

    }
});


$( document ).ready(checkContainer);
    function checkContainer () {
    if($('#avatar').is(':visible')){
        var image = document.getElementById('avatar');
        var cropper = new Cropper(image, {
            aspectRatio: 7 / 9,
            crop: function (e) {
                console.log(e.detail.x);
                console.log(e.detail.y);
                console.log(e.detail.width);
                console.log(e.detail.height);
                console.log(e.detail.rotate);
                console.log(e.detail.scaleX);
                console.log(e.detail.scaleY);
                cropper.getCroppedCanvas();
            },
            preview: '.preview',

        });


    }
    else {
        setTimeout(checkContainer, 50); //wait 50 ms, then try again
    }
}