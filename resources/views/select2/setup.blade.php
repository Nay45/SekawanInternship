@push('css')
<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('js')
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<script>
    function select2Setup(el, useAjax = false, url = null, minimumInputLength = 1, tags = false, placeholder = "-- Pilihan --", elAnotherSelect2 = null, elParent = null) {
        let options = {
            tags: tags,
            placeholder: placeholder,
            minimumInputLength: minimumInputLength,
            allowClear: true,
            width: 'resolve',
            dropdownParent: elParent
                ? $(elParent)
                : $(document.body)
        };

        if (useAjax) {
            options['ajax'] = {
                url: url,
                type: 'GET',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        inUse: elAnotherSelect2 ? $(elAnotherSelect2).map(function(){
                                                        return $(this).val();
                                                    }).get()
                                                : null,
                        q: params.term,
                        page: params.current_page
                    };
                },
                processResults: function(data, params) {
                    params.current_page = params.current_page + 1 || 1;
                    return {
                        results: data.data,
                        pagination: {
                            more: ( data.current_page < data.last_page )
                        }
                    };
                },
                cache: false
            }
        }

        $(el).select2(options);
    }
</script>
@endpush
