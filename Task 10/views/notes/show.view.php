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
            <footer class="mt-6">
                <a href="/note/edit?id=<?= $note['id'] ?>" class="text-grey-500 border border-current px-3 py-2 rounded">Edit</a>
            </footer>
        </div>
    </main>
<?php require base_path('views/partials/footer.php') ?>
