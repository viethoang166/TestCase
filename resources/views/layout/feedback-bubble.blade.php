@once
    @push('head')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css"
            integrity="sha512-ZbehZMIlGA8CTIOtdE+M81uj3mrcgyrh6ZFeG33A4FHECakGrOsTPlPQ8ijjLkxgImrdmSVUHn1j+ApjodYZow=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"
            integrity="sha512-lVkQNgKabKsM1DA/qbhJRFQU8TuwkLF2vSN3iU/c7+iayKs08Y8GXqfFxxTZr1IcpMovXnf2N/ZZoMgmZep1YQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush
    @push('scripts')
        <script>
            $(function() {
                let feedbackHeader = $("#feedback-header");
                let feedbackForm = $("#feedback-form");
                $('.feedback-button').popover({
                    title: () => feedbackHeader,
                    content: () => feedbackForm,
                    html: true,
                    placement: 'top'
                });
            });
        </script>
        <script>
            $(function() {
                $('#content').summernote({
                    tabsize: 2,
                    placeholder: 'Nội dung',
                    height: 200,
                    minHeight: 100,
                    maxHeight: 300,
                    fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather'],
                    fontSizes: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15',
                        '16', '18', '20', '22', '24', '28', '32', '36', '40', '48'
                    ],
                    lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0',
                        '3.0'
                    ],
                    fontSizeUnits: ['px', 'pt', 'rem'],
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['text', ['strikethrough', 'superscript', 'subscript']],
                        ['font', ['fontname', 'fontsize', 'fontsizeunit']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video', 'hr']],
                        ['view', ['fullscreen', 'codeview', 'help']],
                    ],
                });
            });
        </script>
    @endpush
@endonce

@if (Auth::check())
    <button type="button"
        class="Button-control Button-control-title position-fixed rounded d-flex justify-content-center align-items-center feedback-button"
        style="bottom: 2rem; right: 2rem; z-index: 999; width: fit-content;">
        <img src="{{ url('assets/icons/icon-heart-circle.svg') }}" alt=""
            style="max-height: 3rem; margin-right: 1rem;"> Write a review
    </button>
    <div class="d-none">
        <div id="feedback-header">
            {{ __('Feedback') }}
        </div>
        <form id="feedback-form" class="container-fluid" action="{{ route('feedback.sumbit') }}" method="post">
            @csrf
            <div class="feedback-form-item">
                <div class="Select small bordered">
                    <select class="Select-control" name="feedback-type">
                        <option value="" selected disabled hidden>{{ __('Thể loại') }}</option>
                        @foreach (\App\Models\Feedback::TYPES as $type => $value)
                            <option value="{{ $value }}">{{ __($type) }}</option>
                        @endforeach
                    </select>
                    <div class="Select-arrow"> <img src="./assets/icons/icon-angle-down.svg" alt=""></div>
                </div>
            </div>
            <div class="feedback-form-item">
                <div class="Input small bordered">
                    <textarea class="Input-control" type="text" id="content" name="feedback-content"
                        placeholder="{{ __('Nội dung') }}"></textarea>
                </div>
            </div>
            <div class="feedback-form-item">
                <div class="Select small bordered">
                    <select class="Select-control" name="feedback-school_id">
                        <option value="" selected disabled hidden>{{ __('Trường') }}</option>
                        @if (!empty($schools))
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="Select-arrow"> <img src="./assets/icons/icon-angle-down.svg" alt=""></div>
                </div>
            </div>
            <div class="feedback-form-submit flex justify-center">
                <div class="Button secondary small" data-modal-id="">
                    <input class="Button-control Button-control-title flex items-center justify-center" type="submit"
                        value="{{ __('Gửi') }}" onclick="document.querySelector('#feedback-form').submit()">
                </div>
            </div>
        </form>
    </div>
@endif

@if ($errors->first('feedback-*'))
    <div class="ModalError Modal active" id="ModalError">
        <div class="Modal-overlay"> </div>
        <div class="Modal-main">
            <div class="Modal-header">
                {{ __('Error') }}
                <div class="Modal-close Modal-header-close"><img src="./assets/icons/icon-close.svg" alt=""></div>
            </div>
            <div class="Modal-body">
                @error('feedback-type')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('feedback-content')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('feedback-school_id')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <script>
        $('#ModalError .Modal-close').click(() => $('#ModalError').remove());
    </script>
@endif

@if (Session::has('message'))
    <div class="ModalMessage Modal active" id="ModalMessage">
        <div class="Modal-overlay"> </div>
        <div class="Modal-main">
            <div class="Modal-header">
                {{ __('Message') }}
                <div class="Modal-close Modal-header-close"><img src="./assets/icons/icon-close.svg" alt=""></div>
            </div>
            <div class="Modal-body">
                <div class="ModalMessage-item">
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#ModalMessage .Modal-close').click(() => $('#ModalMessage').remove());
    </script>
@endif