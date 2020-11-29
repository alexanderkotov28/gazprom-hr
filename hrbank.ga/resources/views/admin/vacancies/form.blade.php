@extends('layouts.admin')

@section('title') @endsection

@section('content')
    <div class="container section">
        <form id="position_form" action="{{ empty($vacancy)?route('admin.vacancies.create'):route('admin.vacancies.update', $vacancy->id) }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-8">
                    <div class="section__subtitle">Вакансии</div>
                    <div class="section__title">{{ $vacancy->title??'Новая вакансия' }}</div>
                </div>
                <div class="col-4 d-flex">
                    <button class="btn btn_md btn_blue">Сохранить</button>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <field-select name="vacancy[position_id]" default="{{ $position->title??'' }}" options='{{ $positions }}' title="Должность"></field-select>
                        </div>
                        <div class="col-12 mt-4">
                            <field-textarea name="vacancy[comment]" title="Комментарий"></field-textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <field-input type="number" name="vacancy[count]" title="Кол-во кадров"></field-input>
                        </div>
                        <div class="col-12">
                            <datepicker name="vacancy[deadline]" placeholder="Дедлайн вакансии"></datepicker>
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