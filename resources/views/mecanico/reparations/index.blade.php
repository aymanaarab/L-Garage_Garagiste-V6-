@extends('mecanico.test')

@section('content')
    <div class="overflow-x-auto">

        <center>

                <h1 class="text-3xl font-bold from-gray-900 to-gray-400  mt-5">Liste des Réparations:</h1>
            </center>

        <div
            style="box-sizing:border-box;margin:0px;border-radius:10px;background-color:rgb(243, 247, 253);border:1px solid rgb(220, 228, 237);  margin:15px">
            <table
                style="caption-side:top;border-collapse:collapse;box-sizing:border-box;margin:0px;width:100%;border-radius:15px;">
                <thead
                    style="border-color:rgb(128, 128, 128);border-style:solid;border-width:0px;box-sizing:border-box;margin:0px;">
                    <tr
                        style="border-color:rgb(128, 128, 128) rgb(128, 128, 128) rgb(220, 228, 237);border-style:solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;background-color:rgb(243, 247, 253);font-size:14px;font-weight:700;height:40px;color:rgb(0, 0, 0);border-bottom:1px solid rgb(220, 228, 237);background:rgb(243, 247, 253) none repeat scroll 0% 0% / auto padding-box border-box;">
                        <th
                            style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;border-top-left-radius:10px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                            ID
                        </th>
                        <th
                            style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                            Description
                        </th>
                        <th
                            style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                            Statut
                        </th>
                        <th
                            style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                            Date de début
                        </th>
                        <th
                            style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                            Date de fin
                        </th>
                        <th
                            style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;border-top-right-radius:10px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody
                    style="border-color:rgb(128, 128, 128);border-style:solid;border-width:0px;box-sizing:border-box;margin:0px;">
                    @foreach ($reparations as $reparation)
                        <tr
                            style="border-color:rgb(128, 128, 128);border-style:solid;border-width:0px;box-sizing:border-box;margin:0px;background-color:rgb(255, 255, 255);">
                            <td
                                style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                                {{ $reparation->id }}
                            </td>
                            <td
                                style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                                {{ $reparation->description }}
                            </td>
                            <td
                                style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                                {{ $reparation->statut }}
                            </td>
                            <td
                                style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                                {{ $reparation->date_debut }}
                            </td>
                            <td
                                style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                                {{ $reparation->date_fin }}
                            </td>
                            <td
                                style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                                <a href="{{ route('mecanico.reparation.edit', $reparation) }}"
                                    style="select-none;border-radius:15px;border:1px solid rgb(42, 67, 94);padding:5px 10px;text-align:center;font-size:12px;font-weight:600;color:rgb(42, 67, 94);background-color:rgb(243, 247, 253);">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
