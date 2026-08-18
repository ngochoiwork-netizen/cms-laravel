<script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>

<script>
if (document.getElementById('vi_content')) {
    CKEDITOR.replace('vi_content', {
        height: 500,
        allowedContent: true,
    });
}

if (document.getElementById('en_content')) {
    CKEDITOR.replace('en_content', {
        height: 500,
        allowedContent: true,
    });
}
</script>

<script>
function openMediaWindow(inputId) {
    let url = '{{ route('admin.media.popup') }}?select=1&input=' + inputId;

    window.open(
        url,
        'MediaLibrary',
        'width=1100,height=750'
    );
}

function removeMedia(inputId) {

    let input = document.getElementById(inputId);

    if (input) {
        input.value = '';
    }

    let preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }
}

function setMediaFromPopup(inputId, media) {

    let input = document.getElementById(inputId);

    if (input) {
        input.value = media.id;
    }

    let preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = media.url;
        preview.style.display = 'block';
    }
}
</script>

<script>
jQuery(document).ready(function($) {
    if ($.isFunction($.fn.dataTable)) {
        $('.datatable').dataTable();
    }
});
</script>

<script>
function fillSectionJsonExample() {
    let type = document.getElementById('section_type').value;
    let textarea = document.getElementById('section_data');

    let examples = {
        features: {
            items: [
                {
                    icon: "entypo-map",
                    title: "Nội dung du lịch hữu ích",
                    description: "Cung cấp kinh nghiệm du lịch thực tế và dễ áp dụng."
                },
                {
                    icon: "entypo-location",
                    title: "Gợi ý điểm đến",
                    description: "Tổng hợp các địa điểm nổi bật theo từng khu vực."
                }
            ]
        },

        stats: {
            items: [
                {
                    number: "100+",
                    label: "Điểm đến"
                },
                {
                    number: "500+",
                    label: "Bài viết chia sẻ"
                }
            ]
        },

        timeline: {
            items: [
                {
                    year: "2024",
                    title: "Bắt đầu dự án",
                    description: "Xây dựng nền tảng Blog Du Lịch."
                },
                {
                    year: "2025",
                    title: "Mở rộng nội dung",
                    description: "Phát triển hệ thống điểm đến, khách sạn và trải nghiệm."
                }
            ]
        },

        faq: {
            items: [
                {
                    question: "Blog Du Lịch là gì?",
                    answer: "Là website chia sẻ kinh nghiệm, điểm đến và thông tin du lịch."
                },
                {
                    question: "Website có hỗ trợ nhiều ngôn ngữ không?",
                    answer: "Có, hệ thống hỗ trợ tiếng Việt và tiếng Anh."
                }
            ]
        },

        gallery: {
            images: [
                1,
                2,
                3
            ]
        },

        custom: {
            items: []
        }
    };

    if (!examples[type]) {
        textarea.value = '';
        alert('Loại section này không bắt buộc dùng Data JSON.');
        return;
    }

    textarea.value = JSON.stringify(examples[type], null, 4);
}
</script>