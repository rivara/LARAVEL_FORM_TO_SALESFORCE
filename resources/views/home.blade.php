@extends('layouts.appHome')
@section('content')

    <div class="container">
        @if(!empty($successMsg))
            <div id="alert" class="alert alert-success"> {{ $successMsg }}</div>
        @endif


        <form action="{{ route('update',$lang) }}" name="registration" id="form" enctype="multipart/form-data">
            <div class="row justify-content-center">

                <div class="col-4">
                    <h2>@lang('home.title')</h2>
                </div>
                <div class="col-5 completed">
                    &nbsp;&nbsp;<h3>
                        <?php
                        use Illuminate\Support\Facades\Storage;
                        $vacio = 0;
                        $total = 0;
                        ?>
                        @foreach($datos as $dato)
                            <?php $total++; ?>
                            @if($dato==NULL)
                                <?php $vacio++; ?>
                            @endif
                        @endforeach
                        {{round((($total-$vacio)/$total)*100)}} %
                        @lang('home.completed')
                    </h3>
                    <h4>@lang('home.subtitle')</h4>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary mb-2 btn-lg btn-block">@lang('home.save')</button>
                </div>
                <div class="col-12 line">
                </div>

                <div class="col-4">
                    @if(Storage::disk('public')->exists(strtolower($datos->companyName).'.jpg')==True)
                        <div clas="container">
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-link btn-sm fa-lg" data-toggle="modal"
                                            data-target="#modal">
                                        <i style="color:red;" class="fa fa-trash"></i>
                                    </button>
                                </div>
                                <div class="col-10">
                                    <img src="{{Storage::url(strtolower($datos->companyName).'.jpg')}}" width="150"
                                         height="100">
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>


                    @else
                        <button type="button" class=" btn btn-link  " data-toggle="modal"
                                data-target="#modal">
                            <i class="fa fa-cloud-upload fa-4x"></i>
                            <h5>upload</h5>
                        </button>
                    @endisset
                </div>
                <div class="col-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-5 paddingBottom10px">
                                <label class="floatLeft"> @lang('home.companyName')</label>
                            </div>
                            <div class="col-7 paddingBottom10px">
                                <input id="companyName" type="text"
                                       class="form-control @error('companyName') is-invalid @enderror"
                                       name="companyName"
                                       value="@isset($datos->companyName){{$datos->companyName}} @endisset">

                            </div>
                            <div class="col-5 paddingBottom10px">
                                <label class="floatLeft"> @lang('home.companyWeb')</label>
                            </div>
                            <div class="col-7 paddingBottom10px">
                                <input id="companyWeb" type="text" class="form-control" name="companyWeb"
                                       value=@isset($datos->companyWeb){{$datos->companyWeb}} @endisset>

                            </div>
                            <div class="col-5 paddingBottom10px">
                                <label class="floatLeft">@lang('home.Linkedin')</label>
                            </div>
                            <div class="col-7 paddingBottom10px">
                                <input id="Linkedin" type="text" class="form-control" name="Linkedin"
                                       value=@isset($datos->linkedin){{$datos->linkedin}} @endisset>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4"></div>
                <div class="col-12 line"></div>
                <div class="col-4">
                    <div class="container">


                        <div class="row">
                            <div class="col-12">
                                <label class="floatLeft">@lang('home.name')</label>
                            </div>
                            <div class="col-12 paddingBottom10px">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="@isset($datos->name){{$datos->name}} @endisset">

                            </div>

                            <div class="col-12">
                                <label class="floatLeft">@lang('home.surname')</label>
                            </div>
                            <div class="col-12 paddingBottom10px">
                                <input id="surname" type="text" class="form-control" name="surname"
                                       value="@isset($datos->surname){{$datos->surname}} @endisset">

                            </div>


                            <div class="col-12">
                                <label class="floatLeft">@lang('home.position')</label>
                            </div>
                            <div class="col-12 paddingBottom10px">
                                <input id="position" type="text"
                                       class="form-control" name="position"
                                       value="@isset($datos->position){{$datos->position}} @endisset">

                            </div>
                            <div class="col-12">
                                <label>Email*</label>
                            </div>
                            <div class="col-12 paddingBottom10px">
                                <input id="email" type="email"
                                       class="form-control" name="email"
                                       value="@isset($datos->email){{$datos->email}} @endisset">

                            </div>


                            <div class="col-12">
                                <label>@lang('home.phone')</label>
                            </div>
                            <div class="col-12">
                                <input class="form-control" name="phone" id="phone"
                                       value="@isset($datos->phone){{$datos->phone}} @endisset"/>
                            </div>

                            <div class="col-12">
                                <label>@lang('home.mobile')</label>
                            </div>
                            <div class="col-12 paddingBottom10px">
                                <input id="mobile" type="text" class="form-control" name="mobile"
                                       value="@isset($datos->mobile){{$datos->mobile}} @endisset"/>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <label class="floatLeft">@lang('home.country')</label>
                            </div>


                            <div class="col-12 paddingBottom10px">
                                <select id="country" name ="country" class="form-control">
                                    <option value="Edu" selected>Edu</option>
                                </select>
                            </div>
                            <div class="col-12 paddingBottom10px">

                                <label class="floatLeft">@lang('home.stateProvincie')</label>
                            </div>
                            <div class="col-12 paddingBottom10px">
                                <select name ="state" id ="state" class="form-control"></select>

                            </div>


                            <div class="col-12">
                                <label class="floatLeft">@lang('home.postalAddress')</label>
                            </div>
                            <div class="col-6 paddingBottom10px">

                                <input id="postalAddress" type="text" class="form-control" name="postalAddress"
                                       value="@isset($datos->postalAddress){{$datos->postalAddress}} @endisset"
                                />
                            </div>
                            <div class="col-6 paddingBottom10px"></div>
                            <div class="col-12">
                                <label class="floatLeft">@lang('home.companySize')</label>
                            </div>
                            <div class="col-6 paddingBottom10px">
                                <input id="companySize" type="text" class="form-control" name="companySize"
                                       value="@isset($datos->companySize){{$datos->companySize}} @endisset"/>
                            </div>
                            <div class="col-6 paddingBottom10px"></div>
                            <div class="col-12">
                                <label class="floatLeft">
                                    @lang('home.averageClientsSize')
                                </label>
                            </div>
                            <div class="col-6 paddingBottom10px">
                                <input id="averageClientsSize" type="text" class="form-control"
                                       name="averageClientsSize"
                                       value="@isset($datos->averageClientsSize){{$datos->averageClientsSize}} @endisset"/>
                            </div>
                            <div class="col-6 paddingBottom10px"></div>
                            <div class="col-12">
                                <label class="floatLeft">@lang('home.sector')</label>
                            </div>
                            <div class="col-6 paddingBottom10px">

                                <select id="sector" name="sector" class="form-control">
                                    <option value="{{$datos->sector}}" selected> {{$datos->sector}}</option>
                                    <option value="Edu">Edu</option>
                                    <option value="Corp.">Corp.</option>
                                    <option value="Gov">Gov</option>
                                    <option value="All">All</option>
                                </select>
                            </div>
                            <div class="col-6 paddingBottom10px"></div>
                        <!-- <div class="col-12">
                                <label class="floatLeft"> @lang('home.averageClientsTicket')</label>
                            </div>
                            <div class="col-12 paddingBottom10px">
                                <input id="averageClientsTicket" type="text" class="form-control"
                                       name="averageClientsTicket"
                                       value="@isset($datos->averageClientsTicket){{$datos->averageClientsTicket}} @endisset"/>

                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <label class="floatLeft"> @lang('home.LMS')</label>
                            </div>
                            <div class="col-6 paddingBottom10px">
                                <select id="LMS" class="form-control" name="LMS">
                                    @if($datos->LMS==0)
                                        <option value="0" selected>SI</option>
                                        <option value="1">NO</option>
                                    @else
                                        <option value="0">SI</option>
                                        <option value="1" selected>NO</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-12">
                                <label class="floatLeft">
                                    @lang('home.ownGames')
                                </label>
                            </div>
                            <div class="col-6 paddingBottom10px">
                                <select id="ownGames" class="form-control" name="ownGames">
                                    @if($datos->ownGames==0)
                                        <option value="0" selected>SI</option>
                                        <option value="1">NO</option>
                                    @else
                                        <option value="0">SI</option>
                                        <option value="1" selected>NO</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-12">
                                <label class="floatLeft">
                                    @lang('home.instructionalDesigner')
                                </label>
                            </div>
                            <div class="col-6 paddingBottom10px">
                                <select id="instructionalDesigner" class="form-control" name="instructionalDesigner">
                                    @if($datos->instructionalDesigner==0)
                                        <option value="0" selected>SI</option>
                                        <option value="1">NO</option>
                                    @else
                                        <option value="0">SI</option>
                                        <option value="1" selected>NO</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-12">
                                <div class="completed">
                                    <h3>@lang('home.sign')</h3>
                                    <h5>@lang('home.pending')</h5>
                                </div>
                                <div>
                                    <i class="fa fa-pencil-square-o fa-5x" style="color:dimgrey" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 line">
                </div>
                <div class="col-9">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block"> @lang('home.save')</button>
                </div>
            </div>
            <input type="hidden" id="id" name="id" value={{$datos->id}}>
        </form>
    </div>

    <!-- Modal Dialog Subir Logo -->
    <div class="modal fade" id="modal">
        @if(Storage::disk('public')->exists(strtolower($datos->companyName).'.jpg')==False)
            <form action="{{route('recordLogo',$lang)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog">
                    <div class="form-group">
                        <div class="modal-content">
                            <div class="modal-body">
                                <input type="file" id="logo" name="logo" accept="image/png, image/jpeg, image/jpg">
                                <p>Sube el logo de la empresa</p>
                                <small>Max 100 MB</small>
                                <small>Only jpg and png</small>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-info ">
                                    grabar
                                </button>
                                <input type="hidden" name="company" value={{$datos->companyName}}>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
            </form>
        @else
            <form action="{{route('deleteLogo',$lang)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog">
                    <div class="form-group">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p>Borra el logo de la empresa</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-danger ">
                                    borrar
                                </button>
                                <input type="hidden" name="company" value={{$datos->companyName}}>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
            </form>
        @endif
    </div>

@endsection
