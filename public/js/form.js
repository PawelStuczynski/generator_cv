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
        }


    }
});

/*
 * This is not Vue.js code, just a bit of jQuery to test what data would be submitted.
 */
// testSumbit = function () {
//     if (!window.jQuery) {
//         console.warn('jQuery not present!')
//         return false
//     }
//     console.info('Submitted (serverside) array:', jQuery('form').serializeJSON())
// }