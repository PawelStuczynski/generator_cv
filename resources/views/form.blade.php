@extends('layouts.app')
@section('title','Generator CV')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <div class="form col-12 container-fluid" >
        <form  id = 'app' action="{{route('form.save')}}" method="post">
            <input type="hidden" name='_token' value="{{csrf_token()}}" >
            <div class="row justify-content-around">
                <div class="col-12" style="margin-top: 50px;" >
                    <h4 style="text-align: center">Podstawowe dane</h4>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group">
                        <label for="name">Imię:</label>
                        <input type="text" name="name"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="surname">Nazwisko:</label>
                        <input type="text" name="surname"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="phone">Numer telefonu:</label>
                        <input type="text" name="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email"  class="form-control">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group">
                        <label for="adress">Adress:</label>
                        <input type="text" name="adress"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="zipcode">Kod pocztowy:</label>
                        <input type="text" name="zipcode" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="city">Miasto:</label>
                        <input type="text" name="city" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Data urodzenia:</label>
                        <input type="date" name="birthdate" class="form-control" >
                    </div>

                </div>


            <div class="col-12" style="margin-top: 50px;" >
                <h4 style="text-align: center">Wykształcenie</h4>
            </div>
                <div v-for="(education) in educations">
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <button type="button" v-on:click="removeEducation(index)" class="btn btn-block btn-danger">Usuń</button>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <textarea v-model="education.school" name="education[][school]" class="form-control" placeholder="Nazwa szkoły"></textarea>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label for="education[][started]">Data rozpoczęcia</label>
                        <input  type='date' v-model="education.started" name="education[][started]" class="form-control">
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label for="education[][started]">Data zakończenia</label>
                        <input  type='date' v-model="education.ended" name="education[][ended]" class="form-control">
                    </div>
                </div>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <button type="button" v-on:click="addNewEducation" class="btn btn-block btn-success">Dodaj</button>
                    </div>

            <div class="col-12" style="margin-top: 50px;" >
                <h4 style="text-align: center">Doświadczenie</h4>
            </div>

            <div class="col-12" style="margin-top: 50px;" >
                <h4 style="text-align: center">Języki</h4>
            </div>

            <div class="col-12" style="margin-top: 50px;" >
                <h4 style="text-align: center">Dodatkowe umiejętności</h4>
            </div>

            <div class="col-12" style="margin-top: 50px;" >
                <h4 style="text-align: center">Zainteresowania</h4>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12">
                <button type="submit" class="'btn btn-primary">Zapisz</button>
            </div>
            </div>


        </form>
    </div>
    <!-- Scripts -->
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker();
        });

        window.app = new Vue({
            el: '#app',
            data: {
                education: {
                    school: '',
                    started: '',
                    ended: ''
                },
                educations: [],
            },
            mounted: function () {
                /*
                 * The "data-apartments" could come from serverside (already saved apartments)
                 */
                this.educations = JSON.parse(this.$el.dataset.educations)
            },
            methods: {
                addNewEducation: function () {
                    this.educations.push(Vue.util.extend({}, this.education))
                },
                removeEducation: function (index) {
                    Vue.delete(this.educations, index);
                },
                sumbitForm: function () {
                    /*
                     * You can remove or replace the "submitForm" method.
                     * Remove: if you handle form sumission on server side.
                     * Replace: for example you need an AJAX submission.
                     */
                    console.info('<< Form Submitted >>')
                    console.info('Vue.js apartments object:', this.educations)
                    window.testSumbit()
                }
            }
        })

        /*
         * This is not Vue.js code, just a bit of jQuery to test what data would be submitted.
         */
        window.testSumbit = function () {
            if (!window.jQuery) {
                console.warn('jQuery not present!')
                return false
            }
            console.info('Submitted (serverside) array:', jQuery('form').serializeJSON())
        }
    </script>
@endsection
