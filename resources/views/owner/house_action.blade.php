<form action="#">
    <div class="d-flex justify-content-end align-items-center">
            <a class="mr-2" href="{{ route('tenant.property.add', $id) }}"
                title="{{ __('message.update_form_title', ['form' => __('message.additionalfees')]) }}"><i
                    class="fas fa-edit text-primary"></i></a>

            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="additionalfees{{$id}}"
                data--confirmation='true'
                data-title="{{ __('message.delete_form_title', ['form' => __('message.additionalfees')]) }}"
                title="{{ __('message.delete_form_title', ['form' => __('message.additionalfees')]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
    </div>
</form>