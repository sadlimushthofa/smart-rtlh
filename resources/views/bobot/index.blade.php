@extends('layouts.app')

@section('title', 'Data Bobot')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Bobot</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('bobot.tambah') }}" class="btn btn-primary mb-3"><i class="fas fa fa-plus"></i> Tambah Bobot</a>
            <button type="button" class="btn btn-dark btn-normalisasi mb-3"><i class="fas fa fa-recycle"></i> Update Normalisasi Bobot</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kriteria</th>
                            <th>Nilai Bobot</th>
                            @if ($normalisasi_bobot)
                            <th>Nilai Normalisasi Bobot</th>
                            @endif
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php($no = 1)
                        @foreach ($bobot as $row)
                        <tr id="mytable">
                            <input type="hidden" id="id_bobot" value="{{ $row->normalisasi_bobot->id_bobot  }}">
                            <input type="hidden" id="nilai_bobot" value="{{  $row->nilai_bobot  }}">
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->kriteria->nama }}</td>
                            <td>{{ $row->nilai_bobot }}</td>
                            <td>{{ $row->normalisasi_bobot->nilai_normalisasi }}</td>
                            <td>
                                <a href="{{ route('bobot.edit', $row->id) }}" class="btn btn-warning"><i class="fas fa fa-edit"></i> Edit</a>
                                <a href="{{ route('bobot.hapus', $row->id) }}" class="btn btn-danger"><i class="fas fa fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr> 
                        @endforeach --}}
                        @foreach ($bobot as $key => $row)
                            <tr class="data-row">
                                <td class="id_bobot">{{ $key + 1 }}</td>
                                <td>{{ $kriteria[$key]['nama'] }}</td>
                                <td class="nilai_bobot">{{ $row['nilai_bobot'] }}</td>
                                @if ($normalisasi_bobot)
                                    <td>{{ $normalisasi_bobot[$key]['nilai_normalisasi'] }}</td>
                                @endif
                                <td>
                                <a href="{{ route('bobot.edit', $row->id) }}" class="btn btn-warning"><i class="fas fa fa-edit"></i> Edit</a>
                                <a href="{{ route('bobot.hapus', $row->id) }}" class="btn btn-danger"><i class="fas fa fa-trash-alt"></i> Hapus</a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>      
    
@endsection
@section('custome-js')
<script>
    // const Toast = Swal.mixin({
    //   toast: true,
    //   position: 'top-end',
    //   showConfirmButton: false,
    //   timer: 10000,
    //   timerProgressBar: true
    // })
    toastr.options = {
        "progressBar" : true,
        "closeButton" : true,
    }

    $(document).ready(function() {    
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        // $('.btn-normalisasi').on('click', function() {
        //     let kriteriaArray = [];

        //     $('.data-row').each(function() {
        //         // let namaKriteria = $(this).find(".kriteria").val();
        //         let nilaiBobot = $(this).find(".nilai_bobot").val();

        //         let kriteria = {
        //             id_bobot: $(this).find(".id_bobot").val(), // Assuming you have a hidden input with class id_bobot
        //             bobot: parseInt(nilaiBobot) // Convert bobot to an integer
        //         };

        //         kriteriaArray.push(kriteria);
        //     });

        //     console.log(kriteriaArray);
        // });

        $('.btn-normalisasi').on('click', function() {
    let kriteriaArray = [];

    $('.data-row').each(function() {
        let idBobot = $(this).find(".id_bobot").text();
        let nilaiBobot = $(this).find(".nilai_bobot").text();

        let kriteria = {
            id_bobot: idBobot,
            nilai_bobot: nilaiBobot
        };

        kriteriaArray.push(kriteria);
    });
    console.log(kriteriaArray);
    

    // Make an AJAX POST request
    $.ajax({
        type: "POST",
        url: "{{ route('normalisasi.bobot') }}", // Replace with your actual route
        data: {
            _token: "{{ csrf_token() }}",
            kriteriaArray: kriteriaArray
        },
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
});



    //   $('.btn-normalisasi').on('click', function() {
    //     let kriteriaArray = [];
    //     let kriteria;
    //     $('#mytable').each(function(e){
    //        kriteria = {
    //         nama_kriteria : $(".kriteria").text(),
    //         bobot : $('.bobot').text()
    //     }
    //     kriteriaArray.push(kriteria);
    //     })
    //     console.log(kriteriaArray);
        
    //     //   console.log(1);
       
    //     $.ajax({
    //     url: '{{ route("normalisasi.bobot") }}',
    //     type: 'POST',
    //     data : {
    //         "_token": "{{ csrf_token() }}",
    //       },
    //       beforeSend: function() {
    //         $('.btn-normalisasi').html('loading.. <span class="spinner-border spinner-border-sm"></span>');
    //       },
    //       complete: function() {
    //         $('.btn-normalisasi').html('<i class="fas fa fa-recycle"></i>  Update Normalisasi Bobot');
    //       },
    //       success: function(response) {
    //         if (!response.warning) {
    //             toastr.success(response);
    //         //   toastSuccess(response);
    //           reload();
    //         } else {
    //             toastr.error(response);
    //             // console.log("error response".response);
    //             //   toastAlert(response);
    //         }
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //           console.log("error fnctions");
    //           toastr.error("error dong");
    //         //   toastr.error(" lohee" + xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    //         // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    //       }
    //     });
    });
  </script>
@endsection