@extends("admin.layouts.index")
@section("head")

@endsection
@section("content")
    <x-admin.layouts.card class="w-50 mx-auto">
        <x-slot name="title">Create New Article</x-slot>
        <x-slot name="content">
            <form action="" method="POST" class="w-100 text-start">
                <x-admin.elements.input :type="'text'" :name="'test-input'" :id="'test-input'" :class="'form-control'" :placeholder="'Test'"
                                        :labelClass="'text-danger'" :isDisabled="false" {{--:defaultValue="'berkan'"--}}>
                    <x-slot name="label">
                        Test
                    </x-slot>
                </x-admin.elements.input>
                <x-admin.elements.input :type="'text'" :name="'title'" :id="'title'" :label="'Article Title'" :class="'form-control'" :placeholder="'Title'"></x-admin.elements.input>
                <x-admin.elements.textarea :name="'content'" :id="'content'" :label="'Article Content'" :class="'form-control'" :placeholder="'Content'" style="height: 130px;"/>
                @php
                    $options = [
						'0' => 'None selected',
                        '1' => 'PHP',
                        '2' => 'C#',
                        '3' => 'Java',
                    ];
                @endphp
                <x-admin.elements.select :name="'category'" :id="'category'" :label="'Category'" :defaultValue="'0'">
                    <x-slot name="options" :options="$options"></x-slot>
                </x-admin.elements.select>
                <x-admin.elements.checkbox :name="'status'" :id="'status'" :label="'Published?'"></x-admin.elements.checkbox>
                <hr>
                <x-admin.elements.button :type="'submit'" :class="'btn-info text-white w-100'" :value="'Save'"></x-admin.elements.button>
            </form>
        </x-slot>
        <x-slot name="footer">Card Footer</x-slot>
    </x-admin.layouts.card>
@endsection
@section("scripts")

@endsection
