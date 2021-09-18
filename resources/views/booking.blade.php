@extends('layouts.app')

@section('content')

<section class="uk-section" style="background-image: linear-gradient(0deg, rgba(34,195,169,1) 0%, rgba(255,225,200,1) 100%);">
  
    <div class="uk-container">
      
      <div class="uk-flex-center" uk-grid>
        
        <div class="uk-width-2xlarge">
        @if(session('success'))
          <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
          <p>Tempahan telah berjaya dihantar</p>
        </div>
        @endif
          <x-validation-errors />
          <div class="uk-card uk-box-shadow-small" style="background-color:#ffffff; border-radius: 15px;">
            <div class="uk-card-header">
              <h2 class="uk-text-center">{{ ('Tempahan Baharu') }}</h2>

              <hr>
            </div>

            <div class="uk-card-body uk-padding-remove-top">
              <form method="POST" action="{{ route('booking.store') }}">
                @csrf

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Nama Pemohon') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" required autofocus autocomplete="name" />
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('No Telefon') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                    <input type="text" name="phoneNo" value="{{ old('phoneNo') }}" required />
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Tajuk Program') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: comment"></span>
                    <input type="text" name="title" value="{{ old('title') }}" required autofocus autocomplete="name" />
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Nama VIP (Jika Ada)') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input type="text" name="vip" value="{{ old('vip') }}" autofocus autocomplete="name" />
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Bilik') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <select id="room" name="room" required onchange="changeBilik()" >
                    <option hidden selected value> -- Sila pilih -- </option>
                    <option value="Bilik Mesyuarat 1">Bilik Mesyuarat 1</option>
                    <option value="Bilik Mesyuarat 2">Bilik Mesyuarat 2</option>
                    <option value="Bilik Mesyuarat 3">Bilik Mesyuarat 3</option>
                    <option value="Bilik Mesyuarat 4">Bilik Mesyuarat 4</option>
                    </select>
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Tarikh') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                    <input id="tarikh" type="date" name="date" value="{{ old('date') }}" onchange="changeDate()" required />
                  </div>
                </div>

                <div class="uk-grid" >
                <div class="uk-margin">
                  <label class="uk-form-label">{{ ('Masa Mula') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: clock"></span>
                    <input id="startTime" type="time" name="startTime" value="{{ old('startTime') }}" onchange="checkData()" required />
                  </div>
                </div>

                <div >
                  <label class="uk-form-label">{{ ('Masa Tamat') }}</label>

                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: clock"></span>
                    <input id="endTime" type="time" name="endTime" value="{{ old('endTime') }}" onchange="checkData()" required />
                  </div>
                </div></div>

                <div id="tableDiv" class="uk-container" style="display: none"><br>
        <div class="uk-width-1-1 uk-width-1-1">
          <div class="uk-card uk-box-shadow-small uk-box-shadow-hover-medium" style="background-color:#ffffff;  border-radius: 15px;">
            <div class="uk-card-body uk-padding-remove-top">
            <div class="uk-card-header">
              <h3 class="uk-text-center">Senarai Tempahan Sedia Ada Untuk <span id="bilik" style="font-weight: bold"></span> Pada Tarikh <span id="dateSelected" style="font-weight: bold"></span></h3>
            </div>
                <table id="table" class="uk-table uk-table-divider">
                  <thead>
                      <tr>
                          <th>Tajuk Program</th>
                          <th>Masa Mula</th>
                          <th>Masa Tamat</th>
                          <th>Ditempah Oleh</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                      </tr>
                  </tbody>
                </table>
                </div>
          </div>
        </div><br>
    </div>

                <input type="hidden" name="dateSubmit" value="{{ now() }}" />
                <input type="hidden" name="status" value="Tempahan Belum Disahkan" />

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
  <script>

    // const picker = document.getElementById('tarikh');
    // picker.addEventListener('input', function(e){
    //   var day = new Date(this.value).getUTCDay();
    //   if([5,6].includes(day)){
    //     e.preventDefault();
    //     this.value = '';
    //     alert('Weekends not allowed');
    //   }
    // });
    
    var d = new Date();
    dateNow = [
      d.getFullYear(),
      ('0' + (d.getMonth() + 1)).slice(-2),
      ('0' + d.getDate()).slice(-2)
    ].join('-');

    var data = @json($data);
      var newData = [];
      j = 0;
      for (let i = 0; i < data.length; i++) {
        if ( data[i].date >= dateNow ){
          newData[j] = [];
          newData[j][0] = data[i].title;
          newData[j][1] = data[i].startTime;
          newData[j][2] = data[i].endTime;
          newData[j][3] = data[i].name;
          newData[j][4] = data[i].date;
          newData[j][5] = data[i].room;
          j++;
        }
      }

    function checkData(){
      x = document.getElementById("room").value;
      y = document.getElementById("tarikh").value;
      sTime = document.getElementById("startTime").value;
      eTime = document.getElementById("endTime").value;
      z = document.getElementById("tableDiv");

      var timeData = [];

      table = document.getElementById("table");

      while (table.rows.length > 1) {
        table.deleteRow(1);
      }
      if ( x.length === 0 || y.length === 0 ){
        z.style.display = "none";
      } else {
        z.style.display = "block";
      }

      countTimeData = 0;
      for(var i = 0; i < newData.length; i++)
        {
          var newRow = table.insertRow(table.length);
          if (x === newData[i][5] && y === newData[i][4])
          {
          timeData[countTimeData] = [];
          timeData[countTimeData][0] = newData[i][1];
          timeData[countTimeData][1] = newData[i][2];
          countTimeData++;
          for (let j = 0; j < 4; j++)
            {
              var cell = newRow.insertCell(j);
              if ( j === 1){
                cell.innerHTML = convertTime(newData[i][j]);
              }
              else if ( j === 2 ){
                cell.innerHTML = convertTime(newData[i][j]);
              }
              else {
                cell.innerHTML = newData[i][j];
              }
            }
          }
        }

        const picker = document.getElementById('startTime');
        picker.addEventListener('input', function(e){
          startTime = this.value;
          for (let i = 0; i < timeData.length; i++){
            if( startTime >= timeData[i][0] && startTime <= timeData[i][1] ){
              e.preventDefault();
              this.value = '';
              alert('Slot masa yang dipilih telah ditempah oleh program lain, sila pilih slot masa yang lain');
            }
          }
        });

        const picker2 = document.getElementById('endTime');
        picker2.addEventListener('input', function(e){
          endTime = this.value;
          for (let i = 0; i < timeData.length; i++){
            if( endTime >= timeData[i][0] && endTime <= timeData[i][1] ){
              e.preventDefault();
              this.value = '';
              alert('Slot masa yang dipilih telah ditempah oleh program lain, sila pilih slot masa yang lain');
            }
          }
        });

        if ( eTime <= sTime && eTime.length > 0 && sTime.length > 0 ){
          document.getElementById('endTime').value = '';
          alert('Masa Mula haruslah lebih awal dari Masa Tamat');
        }
    }

    function changeBilik(){
      document.getElementById("bilik").innerHTML = document.getElementById("room").value;
      checkData();
    }

    function changeDate(){
      x = document.getElementById("tarikh").value;
      var date = x.split("-");
      document.getElementById("dateSelected").innerHTML = date[2] + "/" + date[1] + "/" + date[0];
      checkData();
    }

    function convertTime(n){
      var time = n.split(":");
      var hour = time[0];
      var min = time[1];
      var ampm = "";
      if ( hour > 12){
        ampm = "PM";
        hour = hour - 12;
      }
      else if ( hour === 0 ){
        ampm = "AM";
        hour = 12;
      }
      else {
        ampm = "AM";
      }
      result = hour + ":" + min + " " + ampm;
      return result; 
    }

    function setMin(n){
      var t = new Date();
      t.setDate(t.getDate() + n); 
      var month = "0"+(t.getMonth()+1);
      var date = "0"+t.getDate();
      month = month.slice(-2);
      date = date.slice(-2);
      var date = t.getFullYear() +"-"+ month +"-"+ date;
      document.getElementById("tarikh").setAttribute('min', date);
    }
    setMin(0);

    function setMax(n){
      var t = new Date();
      t.setDate(t.getDate() + n); 
      var month = "0"+(t.getMonth()+1);
      var date = "0"+t.getDate();
      month = month.slice(-2);
      date = date.slice(-2);
      var date = t.getFullYear() +"-"+ month +"-"+ date;
      document.getElementById("tarikh").setAttribute('max', date);
    }
    setMax(365);

  </script>
@endsection