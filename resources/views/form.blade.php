
@extends('layouts.app')
@section('title','Generator CV')
@section('content')

    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.2.2/cropper.min.css" />


    <div style="text-align: center">
        <img src="{{URL::asset('img/logo.png')}}" width="90%">
    </div>

    <div class="form col-12 container-fluid" id='form_id'>
        <form   action=""  method="post">
            <input type="hidden" name='_token' value="{{csrf_token()}}" >
            <div class="row justify-content-center">
                {{----}}
                {{----}}

                {{--Zdjęcie--}}
                <div class="col-12" style="margin-top: 50px;" >
                    <h4 style="text-align: center"><b>Zdjęcie</b></h4>
                </div>

                <div   class="col-12"  style="margin-top: 20px; text-align: center">
                    <div v-if="!image">
                        <input id="image_id" type="file" @change="onFileChange" onchange="checkContainer()"  style="display: inline" class="">
                    </div>

                    <div  v-else>
                        <div>
                            <img id="avatar" :src="image" />
                            <div class="row justify-content-center">
                                <div class="col-lg-2 col-md-2 col-sm-4 " style="margin: 30px 0px 30px 0px">
                                    <button type="button" @click="removeImage" class=" btn btn-block btn-danger" >Usuń</button>
                                </div>
                            </div>
                            <div class="row justify-content-center" style="text-align: center ">
                                <div class="preview col-lg-2 col-md-2 col-sm-4 ">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12" id="separator" style="height: 3px; background-color: #636b6f; margin-top:20px ; margin-bottom: 20px"></div>
                {{----}}
                {{----}}

                {{--Dane--}}
                <div class="col-12" style="margin-top: 50px;" >
                    <h4 style="text-align: center"><b>Podstawowe dane</b></h4>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group">
                        <label for="name">Imię:</label>
                        <input id="name_id" type="text" v-model="name"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="surname">Nazwisko:</label>
                        <input  id="surname_id" type="text" v-model="surname"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="phone">Numer telefonu:</label>
                        <input id="phone_id" type="text" v-model="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email_id" type="text" v-model="email"  class="form-control">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group">
                        <label for="adress">Adres:</label>
                        <input id="adress_id" type="text" v-model="adress"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="zipcode">Kod pocztowy:</label>
                        <input id="zipcode_id" type="text" v-model="zipcode" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="city">Miasto:</label>
                        <input id="city_id" type="text" v-model="city" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Data urodzenia:</label>
                        <input id="birthdate_id" type="date" v-model="birthdate" class="form-control" >
                    </div>

                </div>
                <div class="col-lg-8 col-md-8 col-sm-12" id="separator" style="height: 3px; background-color: #636b6f; margin-top:20px ; margin-bottom: 20px"></div>
            </div>
            {{----}}
            {{----}}

            {{--Wykształcenie--}}
            <div class="col-12" style="margin-top: 50px;" >
                <h4 style="text-align: center"><b>Wykształcenie</b></h4>
            </div>

            <div v-for="(education, index1) in educations">
                <div class="row justify-content-center"  style="margin-top: 20px">


                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label for="education[][school_begin]">Nazwa szkoły/uczelni:</label>
                        <input v-model="education.school" type="text" name="education[][school]" class="form-control" >
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-sm-12">
                        <label for="education[][school_begin]">Data rozpoczęcia:</label>
                        <input v-model="education.school_begin" type="date" name="education[][school_begin]" class="form-control">
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-sm-12">
                        <label for="education[][school_ended]">Data zakończenia:</label>
                        <input v-model="education.school_ended" type="date" name="education[][school_ended]" class="form-control">
                    </div>
                    <div class="form-group col-lg-8 col-md-8 col-sm-12">
                        <textarea v-model="education.school_information" type="text" name="education[][school_information]" class="form-control" placeholder="Dodatkowe informacje" rows="5"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-sm-4 ">
                        <button type="button" v-on:click="removeEducation(index1)" class="btn btn-block btn-danger">Usuń</button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center"  style="margin-top: 20px">
                <div class="col-lg-2 col-md-2 col-sm-4 ">
                    <button type="button" v-on:click="addNewEducation" class="btn btn-block btn-success">Dodaj</button>
                </div>
            </div>
            <div class="row justify-content-center"  style="margin-top: 20px">
                <div class="col-lg-8 col-md-8 col-sm-12" id="separator" style="height: 3px; background-color: #636b6f; margin-top:20px ; margin-bottom: 20px"></div>
            </div>
            {{----}}
            {{----}}

            {{--Doświadczenie--}}
            <div class="col-12" style="margin-top: 50px;" >
                <h4 style="text-align: center"><b>Doświadczenie</b></h4>
            </div>

            <div v-for="(employer, index2) in employers">
                <div class="row justify-content-center"  style="margin-top: 20px">


                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label for="employer[][corporation_begin]">Nazwa firmy:</label>
                        <input v-model="employer.corporation" type="text" name="employer[][corporation]" class="form-control" >
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-sm-12">
                        <label for="employer[][corporation_begin]">Data rozpoczęcia:</label>
                        <input v-model="employer.corporation_begin" type="date" name="employer[][corporation_begin]" class="form-control">
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-sm-12">
                        <label for="employer[][corporation_ended]">Data zakończenia:</label>
                        <input v-model="employer.corporation_ended" type="date" name="employer[][corporation_ended]" class="form-control">
                    </div>
                    <div class="form-group col-lg-8 col-md-8 col-sm-12">
                        <textarea v-model="employer.corporation_information" type="text" name="employer[][corporation_information]" class="form-control" placeholder="Dodatkowe informacje" rows="5"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-sm-4">
                        <button type="button" v-on:click="removeEmployer(index2)" class="btn btn-block btn-danger">Usuń</button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 20px">
                <div class="col-lg-2 col-md-2 col-sm-4">
                    <button type="button" v-on:click="addNewEmployer" class="btn btn-block btn-success">Dodaj</button>
                </div>
            </div>
            <div class="row justify-content-center"  style="margin-top: 20px">
                <div class="col-lg-8 col-md-8 col-sm-12" id="separator" style="height: 3px; background-color: #636b6f; margin-top:20px ; margin-bottom: 20px"></div>
            </div>
            {{----}}
            {{----}}

            {{--Jezyki--}}
            <div class="col-12" style="margin-top: 50px;" >
                <h4 style="text-align: center"><b>Języki obce</b></h4>
            </div>
            <div v-for="(language, index3) in languages">
                <div class="row justify-content-center"  style="margin-top: 20px">


                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label for="language[][nationality]">Język obcy:</label>
                        <input v-model="language.nationality" type="text" name="language[][nationality]" class="form-control" >
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label for="language[][level]">Poziom:</label>
                        <select v-model="language.level" name="language[][level]" class="form-control" style="height: 34px!important;" >
                            <option>Podstawowy</option>
                            <option>Średnio-Zaawansowany</option>
                            <option>Zaawansowany</option>
                            <option>Ojczysty</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-sm-4">
                        <button type="button" v-on:click="removeLanguage(index3)" class="btn btn-block btn-danger">Usuń</button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 20px">
                <div class="col-lg-2 col-md-2 col-sm-4">
                    <button type="button" v-on:click="addNewLanguage" class="btn btn-block btn-success">Dodaj</button>
                </div>
            </div>
            <div class="row justify-content-center"  style="margin-top: 20px">
                <div class="col-lg-8 col-md-8 col-sm-12" id="separator" style="height: 3px; background-color: #636b6f; margin-top:20px ; margin-bottom: 20px"></div>
            </div>
            {{----}}
            {{----}}

            {{--Dodatkowe umiejętności--}}
            <div class="col-12" style="margin-top: 50px;" >
                <h4 style="text-align: center"><b>Dodatkowe umiejętności</b></h4>
            </div>
            <div class="row justify-content-center"  style="margin-top: 20px">
                <div class="form-group col-lg-8 col-md-8 col-sm-12">
                    <textarea type="text" v-model="additional_abilities" class="form-control" placeholder="Napisz co jeszcze potrafisz" rows="5" ></textarea>
                </div>
            </div>
            <div class="row justify-content-center"  style="margin-top: 20px">
                <div class="col-lg-8 col-md-8 col-sm-12" id="separator" style="height: 3px; background-color: #636b6f; margin-top:20px ; margin-bottom: 20px"></div>
            </div>
            {{----}}
            {{----}}


            {{--Zainteresowania--}}
            <div class="col-12" style="margin-top: 50px;" >
                <h4 style="text-align: center"><b>Zainteresowania</b></h4>
            </div>
            <div class="row justify-content-center"  style="margin-top: 20px">
                <div class="form-group col-lg-8 col-md-8 col-sm-12">
                    <textarea type="text" v-model="interests" class="form-control" placeholder="Napisz czym się interesujesz" rows="5" ></textarea>
                </div>
            </div>
            <div class="row justify-content-center"  style="margin-top: 20px">
                <div class="col-lg-8 col-md-8 col-sm-12" id="separator" style="height: 3px; background-color: #636b6f; margin-top:20px ; margin-bottom: 20px"></div>
            </div>
            {{----}}
            {{----}}
            <div  class="row justify-content-center"  style="margin-top: 20px">
                <div class="form-group col-lg-8 col-md-8 col-sm-12" style="display: flex">
                    <input  type="checkbox" v-model="agreement" >
                    <p id="agreement_id" class=""> Wyrażam zgodę na przetwarzanie moich danych osobowych dla potrzeb niezbędnych do realizacji procesu rekrutacji (zgodnie z Ustawą z dnia 29.08.1997 roku o Ochronie Danych Osobowych; tekst jednolity: Dz. U. 2016 r. poz. 922).</p>
                </div>
            </div>
            <div class="row justify-content-center"  style="margin-top: 20px">
                <div class="col-lg-2 col-md-2 col-sm-4">
                    <button id="button_submit" @click="sendForm" type="submit" class="btn btn-block btn-primary">Zapisz</button>
                </div>
            </div>
            <div class="row justify-content-center"  style="margin-top: 20px">
                <div class="col-lg-8 col-md-8 col-sm-12" id="separator" style="height: 3px; background-color: #636b6f; margin-top:20px ; margin-bottom: 20px"></div>
            </div>

        </form>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>Vue.config.debug = true; Vue.config.devtools = true;</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.2.2/cropper.min.js"></script>

    <script src="{{ asset('js/form.js') }}"></script>

    {{--<script src="{{ asset('js/vue.js') }}"></script>--}}


@endsection
