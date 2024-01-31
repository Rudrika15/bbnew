@extends('extra.master')
@section('title', 'Brand beans | Create Campaign Step')
@section('content')
    <div class='container'>
        <div class='row pt-5'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3> Followed Steps </h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('brand.campaign.appliers') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        @foreach ($postImage as $data)
                            <div class="col-md-3" style="padding-bottom: 33px;">
                                <div class="dropdown">

                                    @if ($data->status == 'Rejected')
                                        <span class="badge btn-danger">Rejected</span>
                                    @endif
                                    @if ($data->status == 'Approved')
                                        <span class="badge btn-success">Approved</span>
                                    @endif
                                    @if ($data->status == 'Pending')
                                        <span class="badge btn-primary">Pending</span>
                                    @endif
                                    <a href="{{ asset('checkApplyFile') }}/{{ $data->file }}" target="_blank">
                                        <img class="img-thumbnail" style="height: 200px; width: 200px;" src="{{ asset('checkApplyFile') }}/{{ $data->file }}" alt="image">
                                    </a>

                                    <div class="dropdown-content">
                                        <div style="display: flex; justify-content: space-between;">
                                            <a class="btn btn-sm btn-success" href="{{ route('brand.campaign.influencerContentApproval') }}/{{ request('campaignId') }}/{{ $data->userId }}/{{ $data->id }}" onclick="return confirm('Are you sure?')"><i class="menu-icon fa fa-check-circle-o text-white fa-lg"></i></a>
                                            <a class="btn btn-sm btn-primary" href="{{ route('brand.campaign.influencerContentOnHold') }}/{{ request('campaignId') }}/{{ $data->userId }}/{{ $data->id }}"><i class="menu-icon fa fa-pause text-white fa-lg"></i></a>
                                            <a class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $data->id }}"><i class="menu-icon fa fa-close text-white fa-lg"></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- modal -->
                            <div class="remodal" data-remodal-id="remodal-{{ $data->id }}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                                <div class="remodal-content">
                                    <h2 id="modal1Title">Message for Rejection</h2>
                                    <p id="modal1Desc">

                                    </p>
                                </div>
                            </div>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('brand.campaign.influencerContentReject') }}" method="post">
                                                @csrf
                                                <label for="">Message</label>
                                                <input type="hidden" name="imageId" value="{{ $data->id }}">
                                                <input type="hidden" name="userId" value="{{ $data->userId }}">
                                                <input type="hidden" name="campaignId" value="{{ request('campaignId') }}">
                                                <textarea name="remark" placeholder="Add remark for rejection" class="form-control"></textarea>
                                                <br>
                                                <button type="submit" class="btn btn-success">OK</button>
                                                <button data-remodal-action="cancel" class="btn btn-danger">Cancel</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!-- video -->

                        @foreach ($postVideo as $videoData)
                            <div class="col-md-3" style="padding-bottom: 33px;">
                                <div class="dropdown">

                                    @if ($data->status == 'Rejected')
                                        <span class="badge btn-danger">Rejected</span>
                                    @endif
                                    @if ($data->status == 'Approved')
                                        <span class="badge btn-success">Approved</span>
                                    @endif
                                    @if ($data->status == 'Pending')
                                        <span class="badge btn-primary">Pending</span>
                                    @endif
                                    <div class="">
                                        <video width="250" class="img-thumbnail" height="300" controls>
                                            <source src="{{ asset('checkApplyFile/' . $videoData->file) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                    <div class="dropdown-content">
                                        <div style="display: flex; justify-content: space-between;">
                                            <a class="btn btn-sm btn-success" href="{{ route('brand.campaign.influencerContentApproval') }}/{{ request('campaignId') }}/{{ $data->userId }}/{{ $data->id }}" onclick="return confirm('Are you sure?')"><i class="menu-icon fa fa-check-circle-o text-white fa-lg"></i></a>
                                            <a class="btn btn-sm btn-primary" href="{{ route('brand.campaign.influencerContentOnHold') }}/{{ request('campaignId') }}/{{ $data->userId }}/{{ $data->id }}"><i class="menu-icon fa fa-pause text-white fa-lg"></i></a>
                                            <a class="btn btn-sm btn-danger" data-remodal-target="remodal-{{ $data->id }}" href="#"><i class="menu-icon fa fa-close text-white fa-lg"></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- modal -->
                            <div class="remodal" data-remodal-id="remodal-{{ $data->id }}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                                <div class="remodal-content">
                                    <h2 id="modal1Title">Message for Rejection</h2>
                                    <p id="modal1Desc">
                                    <form action="{{ route('brand.campaign.influencerContentReject') }}" method="post">
                                        @csrf
                                        <label for="">Message</label>
                                        <input type="hidden" name="imageId" value="{{ $data->id }}">
                                        <input type="hidden" name="userId" value="{{ $data->userId }}">
                                        <input type="hidden" name="campaignId" value="{{ request('campaignId') }}">
                                        <textarea name="remark" placeholder="Add remark for rejection" class="form-control"></textarea>
                                        <br>
                                        <button type="submit" class="btn btn-success">OK</button>
                                        <button data-remodal-action="cancel" class="btn btn-danger">Cancel</button>
                                    </form>
                                    </p>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($steps as $steps)
                            <div class="activity-item">
                                <?php
                                $counter = 0;
                                foreach ($followedStep as $followedStepData) {
                                    if ($followedStepData->stepId === $steps->id) {
                                        $counter++;
                                    }
                                }
                                ?>
                                <div class="bar @if ($counter > 0) bg-success  @else bg-danger @endif">
                                    <div class="dot @if ($counter > 0) bg-success @else bg-danger @endif"></div>
                                </div>
                                <div class="content">
                                    <div class="date"> {{ $steps->title }}</div>
                                    <div class="text">

                                        <div class="row">
                                            <div class="col-md-6">
                                                {{ $steps->detail }}
                                            </div>
                                            <div class="col-md-6">


                                                @if ($counter > 0)
                                                    &nbsp; <i class="fa fa-check text-success" title="Done"></i>
                                                @else
                                                    &nbsp; <i class="fa fa-times text-danger" title="Not Done"></i>
                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

    </div>

@endsection
