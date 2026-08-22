@if ($workflowSection)

    @php
        $workflowData = $workflowSection->data_json ?? [];
        $steps = $workflowData['steps'] ?? [];

        $stepCount = count($steps);

        $columnClass = match ($stepCount) {
            1 => 'col-lg-12',
            2 => 'col-lg-6',
            3 => 'col-lg-4',
            4 => 'col-lg-3',
            6 => 'col-lg-2',
            default => '',
        };
    @endphp

    <!-- POS Integration start -->
    <div class="rts-working-process-area merchant-pos-integration rts-section-gap">

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

                        @if ($workflowSection->content)
                            <p class="disc">
                                {!! $workflowSection->content !!}
                            </p>
                        @endif

                    </div>

                </div>

            </div>

            @if ($stepCount)

                <div class="row mt--40">

                    <div class="col-lg-12">

                        <div class="working-process-three-main">

                            <div class="row g-5 {{ $stepCount === 5 ? 'workflow-five-columns' : '' }}">

                                @foreach ($steps as $step)

                                    <div class="{{ $stepCount === 5 ? 'workflow-column' : $columnClass . ' col-md-6 col-sm-12' }}">

                                        <div class="working-process-wrapper-three">

                                            @if (!empty($step['icon']))
                                                <div class="step-icon">
                                                    <i class="{{ $step['icon'] }}"></i>
                                                </div>
                                            @endif

                                            @if (!empty($step['title']))
                                                <h5 class="title">
                                                    {{ $step['title'] }}
                                                </h5>
                                            @endif

                                            @if (!empty($step['description']))
                                                <p class="disc">
                                                    {{ $step['description'] }}
                                                </p>
                                            @endif

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
    <!-- POS Integration end -->

@endif