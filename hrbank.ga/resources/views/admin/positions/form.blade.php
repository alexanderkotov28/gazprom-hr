@extends('layouts.admin')

@section('title') @endsection

@section('content')
    <div class="container section">
        <form id="position_form" action="{{ empty($position)?route('admin.positions.create'):route('admin.positions.update', $position->id) }}" method="POST">
            @csrf

            <input type="hidden" name="data" id="position_data">

            <div class="row">
                <div class="col-8">
                    <div class="section__subtitle">Должности</div>
                    <div class="section__title">{{ $position->title??'Новая должность' }}</div>
                </div>
                <div class="col-4 d-flex">
                    <button type="button" @click="getPositionData" class="btn btn_md btn_blue">Сохранить</button>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <field-input name="position[title]" default="{{ $position->title??'' }}" title="Должность"></field-input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="h2">Требования</div>
                            <div class="subtitle">Составьте список требований для данной должности. В зависимости от выбранного требования, Вы можете дополнить его описанием или смежными с ним компетенциями</div>
                            <div class="row">
                                <requirements default='{{ json_encode($result??'') }}' ref="req" req='{{ $requirements }}'></requirements>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="h2">Условия</div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="h3">График</div>
                                    <div class="mt-2 row">
                                        <div class="col-2">
                                            <input checked id="check-sheduale_5/2" name="position[sheduale]" value="5/2" class="input" type="radio">
                                            <label for="check-sheduale_5/2">5/2</label>
                                        </div>
                                        <div class="col-2">
                                            <input id="check-sheduale_6/1" name="position[sheduale]" value="6/1" class="input" type="radio">
                                            <label for="check-sheduale_6/1">6/1</label>
                                        </div>
                                        <div class="col-3">
                                            <input id="check-sheduale_free" name="position[sheduale]" value="free" class="input" type="radio">
                                            <label for="check-sheduale_free">Свободный</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    {{--                <div class="preview"></div>--}}
                </div>
            </div>

        </form>
    </div>
@endsection
<script>
    import Requirements from "../../../js/components/requirements";
    export default {
        components: {Requirements}
    }
</script>