<x-layout>
    <x-slot:title>Form post</x-slot:title>
    <h3>Form save post</h3>

    <form action="" class="form-example" method="POST">
        @csrf
        <div class="form-example">
            <label>
                Name:
                <input name="title" required>
            </label>
        </div>
        <div class="form-example">
            <label>
                Slug:
                <input name="slug" required>
            </label>
        </div>
        <div class="form-example">
            <label>
                Domain:
                <input name="domain" required>
            </label>
        </div>
        <div class="form-example">
            <label>
                Id category:
                <input name="category_id" required>
            </label>
        </div>

        <button>Save</button>
    </form>

</x-layout>
