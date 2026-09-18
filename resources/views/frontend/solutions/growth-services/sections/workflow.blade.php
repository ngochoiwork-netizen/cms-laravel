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

    <!-- Social media workflow start -->
    <section
        class="rts-working-process-area merchant-pos-integration rts-section-gap"
        @if ($workflowSection->title)
            aria-labelledby="social-media-workflow-title"
        @endif
    >
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
                            <h2
                                id="social-media-workflow-title"
                                class="title rts-text-anime-style-1"
                            >
                                {{ $workflowSection->title }}
                            </h2>
                        @endif

                        @if ($workflowSection->content)
                            <div class="disc">
                                {!! $workflowSection->content !!}
                            </div>
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

                                        <article class="working-process-wrapper-three">

                                            @if (!empty($step['icon']))
                                                <div class="step-icon" aria-hidden="true">
                                                    <i class="{{ $step['icon'] }}"></i>
                                                </div>
                                            @endif

                                            @if (!empty($step['title']))
                                                <h3 class="title">
                                                    {{ $step['title'] }}
                                                </h3>
                                            @endif

                                            @if (!empty($step['description']))
                                                <p class="disc">
                                                    {{ $step['description'] }}
                                                </p>
                                            @endif

                                        </article>

                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            @endif

        </div>
    </section>
    <!-- Social media workflow end -->
@endif