@if ($posIntegrationSection)
    @php
        $workflowData = $posIntegrationSection->data_json ?? [];
        $steps = $workflowData['steps'] ?? [];

        $highlightTitle = $workflowData['highlight_title'] ?? null;
        $highlightText = $workflowData['highlight_text'] ?? null;

        $stepCount = count($steps);
        $isVietnamese = app()->getLocale() === 'vi';

        $sectionLabel = $isVietnamese
            ? 'Quy trình thanh toán với Senverse POS'
            : 'Payment workflow with Senverse POS';

        $columnClass = match ($stepCount) {
            1 => 'col-lg-12',
            2 => 'col-lg-6',
            3 => 'col-lg-4',
            4 => 'col-lg-3',
            6 => 'col-lg-2',
            default => 'col-lg-4',
        };
    @endphp

    <!-- POS Integration start -->
    <section
        id="merchant-payment-workflow"
        class="rts-working-process-area merchant-pos-integration rts-section-gap"
        @if ($posIntegrationSection->title)
            aria-labelledby="merchant-payment-workflow-title"
        @else
            aria-label="{{ $sectionLabel }}"
        @endif
    >
        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="title-center-wrapper">

                        @if ($posIntegrationSection->subtitle)
                            <span class="pre">
                                {{ $posIntegrationSection->subtitle }}
                            </span>
                        @endif

                        @if ($posIntegrationSection->title)
                            <h2
                                id="merchant-payment-workflow-title"
                                class="title rts-text-anime-style-1"
                            >
                                {{ $posIntegrationSection->title }}
                            </h2>
                        @endif

                        @if ($posIntegrationSection->content)
                            <div class="disc merchant-workflow-intro">
                                {!! $posIntegrationSection->content !!}
                            </div>
                        @endif

                    </div>

                </div>

            </div>

            @if ($stepCount)
                <div class="row mt--40">

                    <div class="col-lg-12">

                        <div class="working-process-three-main">

                            <div
                                class="row g-5 {{ $stepCount === 5 ? 'workflow-five-columns' : '' }}"
                            >
                                @foreach ($steps as $index => $step)

                                    <div
                                        class="{{ $stepCount === 5
                                            ? 'workflow-column'
                                            : $columnClass . ' col-md-6 col-sm-12' }}"
                                    >
                                        <article class="working-process-wrapper-three">

                                            @if (!empty($step['number']))
                                                <span
                                                    class="merchant-step-number"
                                                    aria-hidden="true"
                                                >
                                                    {{ $step['number'] }}
                                                </span>
                                            @else
                                                <span
                                                    class="merchant-step-number"
                                                    aria-hidden="true"
                                                >
                                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                                </span>
                                            @endif

                                            @if (!empty($step['icon']))
                                                <div
                                                    class="step-icon"
                                                    aria-hidden="true"
                                                >
                                                    <i class="{{ $step['icon'] }}"></i>
                                                </div>
                                            @endif

                                            @if (!empty($step['title']))
                                                <h3 class="title merchant-workflow-step-title">
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

            @if ($highlightTitle || $highlightText)
                <div class="row mt--50">

                    <div class="col-lg-10 offset-lg-1">

                        <div class="merchant-workflow-highlight">

                            @if ($highlightTitle)
                                <h3 class="merchant-workflow-highlight-title">
                                    {{ $highlightTitle }}
                                </h3>
                            @endif

                            @if ($highlightText)
                                <p>
                                    {{ $highlightText }}
                                </p>
                            @endif

                        </div>

                    </div>

                </div>
            @endif

        </div>
    </section>
    <!-- POS Integration end -->
@endif