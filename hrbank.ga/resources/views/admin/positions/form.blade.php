@extends('layouts.admin')

@section('title') @endsection

@section('content')
    <div class="container section">

        <div class="row">
            <div class="col-12">
                <div class="section__title">Новая должность</div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <field-input title="Должность"></field-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="h2">Требования</div>
                        <div class="subtitle">Составьте список требований для данной должности. В зависимости от выбранного требования, Вы можете дополнить его описанием или смежными с ним компетенциями</div>
                        <div class="row">
                            <requirements req='{{ $requirements }}'></requirements>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="h2">Условия</div>
                        <div class="row">
                            <div class="col-6">
                                <input id="check-sheduale_5/2" name="position[sheduale]" class="input" type="radio">
                                <label for="check-sheduale_5/2">5/2</label>
                            </div>
{{--                            <datepicker></datepicker>--}}
{{--                            <vue-timepicker></vue-timepicker>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="preview"></div>
            </div>
        </div>
    </div>
@endsection
<script>
    import Requirements from "../../../js/components/requirements";
    export default {
        components: {Requirements}
    }
</script>