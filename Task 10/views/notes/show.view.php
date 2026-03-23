<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href = "/note?id=<?=$note['transaction_id']?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($note['customer_phone']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <p class="mt-6">
                <a href="/notes/create" class="text-blue-500 hover:underline">Create a note</a>
            </p>
            <form class="mt-6" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
            </form>
        </div>
    </main>
<?php require base_path('views/partials/footer.php') ?>
