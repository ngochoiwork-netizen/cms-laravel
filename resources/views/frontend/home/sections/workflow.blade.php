@if ($workflowSection)

    @php
        $workflowData = $workflowSection->data_json ?? [];
        $steps = $workflowData['steps'] ?? [];
    @endphp

    <div class="rts-working-process-area rts-section-gap">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="title-center-wrapper">

                        @if ($workflowSection->subtitle)

                            <span class="pre">

                                {{ $workflowSection->subtitle }}

                            </span>

                        @endif

                        @if ($workflowSection->title)

                            <h2 class="title rts-text-anime-style-1">

                                {{ $workflowSection->title }}

                            </h2>

                        @endif

                    </div>

                </div>

            </div>

            @if (!empty($steps))

                <div class="row mt--40">

                    <div class="col-lg-12">

                        <div class="working-process-three-main">

                            <div class="row g-5">

                                @foreach ($steps as $step)

                                    <div class="col-lg-3 col-md-6 col-sm-12">

                                        <div class="working-process-wrapper-three">

                                            <h5 class="title">

                                                {{ $step['title'] ?? '' }}

                                            </h5>

                                            <p class="disc">

                                                {{ $step['description'] ?? '' }}

                                            </p>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>

@endif