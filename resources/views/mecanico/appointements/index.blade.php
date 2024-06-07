@extends('mecanico.test')

@section('content')
    <div class="overflow-x-auto">

        <center>

            <h1 class="text-3xl font-bold from-gray-900 to-gray-400  mt-5">Liste des rendez-vous:</h1>
        </center>

        <div
            style="box-sizing:border-box;margin:0px;border-radius:10px;background-color:rgb(243, 247, 253);border:1px solid rgb(220, 228, 237);  margin:15px">
            @foreach ($rendezvous as $rdv)
                @php
                    $statut = $rdv->statut;
                @endphp
                @if ($statut == 'Demandé')
                    <div class="bg-white shadow-md rounded-lg p-6 mb-6 transition duration-300 ease-in-out hover:shadow-lg">
                        <h1 class="text-2xl font-semibold text-gray-800 mb-4">
                            Client <span class="text-indigo-600">{{ $rdv->client->firstname }}</span> a demandé un
                            rendez-vous
                        </h1>
                        <div class="flex space-x-4">
                            <button
                                class="select-none rounded-lg bg-green-600 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button" data-dialog-target="sign-in-dialog">
                                Accepter </button>
                            <div data-dialog-backdrop="sign-in-dialog" data-dialog-backdrop-close="true"
                                class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-green bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                                <div data-dialog="sign-in-dialog"
                                    class="relative mx-auto flex w-full max-w-[24rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                                    <div class="flex flex-col gap-4 p-6">
                                        <h4
                                            class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                            Creer une reparation fiche </h4>
                                        <p
                                            class="block mb-3 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                                            Fill the infos to make a repair
                                        </p>
                                        <h6
                                            class="block -mb-2 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-inherit">
                                            Description </h6>
                                        <div class="relative h-11 w-full min-w-[200px]">
                                            <input
                                                class="w-full h-full px-3 py-3 font-sans text-sm font-normal transition-all bg-transparent border rounded-md peer border-blue-gray-200 border-t-transparent text-blue-gray-700 outline outline-0 placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                placeholder=" " />
                                            <label
                                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                                Description
                                            </label>
                                        </div>
                                        <h6
                                            class="block -mb-2 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-inherit">
                                            Notes Mecanicies </h6>
                                        <div class="relative h-11 w-full min-w-[200px]">
                                            <input
                                                class="w-full h-full px-3 py-3 font-sans text-sm font-normal transition-all bg-transparent border rounded-md peer border-blue-gray-200 border-t-transparent text-blue-gray-700 outline outline-0 placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                placeholder=" " />
                                            <label
                                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                                Notes Mecaniciens
                                            </label>
                                        </div>
                                        <h6
                                            class="block -mb-2 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-inherit">
                                            Statut </h6>
                                        <div class="relative h-11 w-full min-w-[200px]">
                                            <input
                                                class="w-full h-full px-3 py-3 font-sans text-sm font-normal transition-all bg-transparent border rounded-md peer border-blue-gray-200 border-t-transparent text-blue-gray-700 outline outline-0 placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                placeholder=" " />
                                            <label
                                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                                Statut
                                            </label>
                                        </div>
                                        <h6
                                            class="block -mb-2 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-inherit">
                                            Date Debut </h6>
                                        <div class="relative h-11 w-full min-w-[200px]">
                                            <input
                                                class="w-full h-full px-3 py-3 font-sans text-sm font-normal transition-all bg-transparent border rounded-md peer border-blue-gray-200 border-t-transparent text-blue-gray-700 outline outline-0 placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                type="date" placeholder=" " />
                                            <label
                                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                                Date Debut
                                            </label>
                                        </div>
                                        <h6
                                            class="block -mb-2 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-inherit">
                                            Date Fin </h6>
                                        <div class="relative h-11 w-full min-w-[200px]">
                                            <input
                                                class="w-full h-full px-3 py-3 font-sans text-sm font-normal transition-all bg-transparent border rounded-md peer border-blue-gray-200 border-t-transparent text-blue-gray-700 outline outline-0 placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                type="date" placeholder=" " />
                                            <label
                                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                                Date Debut
                                            </label>
                                        </div>
                                        <h6
                                            class="block -mb-2 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-inherit">
                                            Client </h6>
                                        <div class="relative h-11 w-full min-w-[200px]">
                                            <input
                                                class="w-full h-full px-3 py-3 font-sans text-sm font-normal transition-all bg-transparent border rounded-md peer border-blue-gray-200 border-t-transparent text-blue-gray-700 outline outline-0 placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                type="text" value="{{$rdv->clientID}}" placeholder="$rdv->client->firstname" disabled />
                                            <label
                                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                                Client
                                            </label>
                                        </div>

                                        <h6
                                            class="block -mb-2 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-inherit">
                                            Vehicule </h6>
                                        <div class="relative h-11 w-full min-w-[200px]">
                                            <div class="relative h-10 w-72 min-w-[200px]">
                                                <select
                                                    class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 empty:!bg-gray-900 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">
                                                    @foreach ($rdv->client->vehicules as $vehicule)
                                                        <option value="$vehicule->id">{{ $vehicule->marque }}</option>
                                                        @endforeach
                                                </select>


                <label
                    class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    Select a vehicule
                </label>
        </div>

    </div>
    <div class="-ml-2.5 -mt-3">
        <div class="inline-flex items-center">
        </div>
    </div>
    </div>
    <div class="p-6 pt-0">
        <button
            class="block w-full select-none rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            type="button">
            Make the repair
        </button>

    </div>
    </div>
    </div>
    <button
        class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-400">
        Refuser
    </button>
    </div>
    </div>
@else
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
                    style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;border-top-left-radius:10px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                    ClientName
                </th>


                <th
                    style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                    Date de rendez vous
                </th>
                <th
                    style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                    Heure de rendez vous
                </th>
                <th
                    style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;border-top-right-radius:10px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                    Statut
                </th>
                <th
                    style="border-color:rgb(0, 50, 125) rgb(0, 50, 125) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;text-align:left;box-sizing:border-box;margin:0px;border-top-right-radius:10px;padding:10px 15px;font-size:12px;font-weight:600;color:rgb(0, 50, 125);border-bottom:1px solid rgb(220, 228, 237);">
                    etat vehicule
                </th>
            </tr>
        </thead>
        <tbody
            style="border-color:rgb(128, 128, 128);border-style:solid;border-width:0px;box-sizing:border-box;margin:0px;">
            <tr
                style="border-color:rgb(128, 128, 128);border-style:solid;border-width:0px;box-sizing:border-box;margin:0px;background-color:rgb(255, 255, 255);">
                <td
                    style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                    {{ $rdv->id }}
                </td>
                <td
                    style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                    {{ $rdv->client->firstname }}
                </td>

                <td
                    style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                    {{ $rdv->date_rendez_vous }}
                </td>

                <td
                    style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                    {{ $rdv->heure_rendez_vous }}
                </td>
                <td
                    style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                    {{ $rdv->statut }}
                </td>
                <td
                    style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                    {{ $rdv->etat_vehicule }}
                </td>
                <td
                    style="border-color:rgb(42, 67, 94) rgb(42, 67, 94) rgb(220, 228, 237);border-style:none none solid;border-width:0px 0px 1px;box-sizing:border-box;margin:0px;padding:10px 15px;font-size:13px;font-weight:500;color:rgb(42, 67, 94);border-bottom:1px solid rgb(220, 228, 237);">
                    <a href="{{ route('mecanico.appointements.edit', $rdv) }}"
                        style="select-none;border-radius:15px;border:1px solid rgb(42, 67, 94);padding:5px 10px;text-align:center;font-size:12px;font-weight:600;color:rgb(42, 67, 94);background-color:rgb(243, 247, 253);">
                        Edit
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    @endif
    @endforeach
    </div>


    </div>
@endsection
