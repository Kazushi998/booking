@extends('layouts.app')

@section('content')

<section class="uk-section uk-padding-remove" style="background-image: linear-gradient(0deg, rgba(34,195,169,1) 0%, rgba(255,225,200,1) 100%);">
  
    <div class="uk-container">
      
      <div class="uk-flex-center" uk-grid>
        
        <div class="uk-width-2xlarge">

        <div>
        <a class="uk-button uk-button-primary uk-border-rounded uk-margin-small-top uk-margin-small-bottom" href="/dashboard"><span uk-icon="chevron-left"></span></a>
        </div>

        @if(session('success'))
          <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
          <p>Tempahan telah berjaya dikemaskini</p>
        </div>
        @endif
          <x-validation-errors />
          <div class="uk-card uk-box-shadow-small" style="background-color:#ffffff; border-radius: 15px;">
            <div class="uk-card-header">
              <h2 class="uk-text-center">{{ ('Kemaskini Tempahan') }}</h2>

              <hr>
            </div>

            <div class="uk-card-body uk-padding-remove-top">
              <form method="POST" action="{{ route('booking.update', $booking->id) }}">
              @method('put')  
              @csrf

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Nama Pemohon') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input type="text" name="name" value="{{ $booking->name }}" required readonly autofocus autocomplete="name" />
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('No Telefon') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                    <input type="text" name="phoneNo" value="{{ $booking->phoneNo }}" required readonly />
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Tajuk Program') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: comment"></span>
                    <input type="text" name="title" value="{{ $booking->title }}" required readonly autofocus autocomplete="name" />
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Nama VIP (Jika Ada)') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input type="text" name="vip" value="{{ $booking->vip }}" autofocus autocomplete="name" />
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Bilik') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: sign-in"></span>
                    <input type="text" name="room" value="{{ $booking->room }}" autofocus autocomplete="name" />
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Tarikh') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                    <input id="tarikh" type="date" name="date" value="{{ $booking->date }}" onchange="changeDate()" required readonly />
                  </div>
                </div>

                <div class="uk-grid" >
                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Masa Mula') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: clock"></span>
                    <input id="startTime" type="time" name="startTime" value="{{ $booking->startTime }}" onchange="checkData()" required readonly />
                  </div>
                </div>

                <div >
                  <label class="uk-form-label">{{ ('Masa Tamat') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: clock"></span>
                    <input id="endTime" type="time" name="endTime" value="{{ $booking->endTime }}" onchange="checkData()" required readonly />
                  </div>
                </div></div>

                <div >
                  <label class="uk-form-label">{{ __('Tarikh Tempahan Dihantar') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                    <input type="text" name="dateSubmit" value="{{ $booking->dateSubmit }}" required readonly  />
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ __('Status Tempahan') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <select name="status" required >
                    <option hidden disabled selected value="{{ $booking->status }}"> {{ $booking->status }} </option>
                    <option value="Tempahan Telah Disahkan">Sahkan Tempahan</option>
                    <option value="Tempahan Telah Ditolak">Tolak Tempahan</option>
                    </select>
                  </div>
                </div>

                <div class="uk-margin">
                  <button class="uk-button uk-border-rounded uk-button-primary uk-width-1-1" type="submit">
                    {{ ('Hantar') }}
                  </button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection