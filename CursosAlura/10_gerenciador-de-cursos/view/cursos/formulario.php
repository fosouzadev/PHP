<?php include __DIR__ . '/../inicio-html.php'; ?>
    
    <form action="/salvar-curso" method="POST">
        <div class="form-group">
            <input type="hidden" id="id" name="id" value="<?= isset($curso) ? $curso->getId() : ''; ?>" />

            <label for="descricao">Descricao</label>
            <input 
                type="text" 
                id="descricao" 
                name="descricao" 
                class="form-control" 
                value="<?= isset($curso) ? $curso->getDescricao() : ''; ?>" />
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>

<?php include __DIR__ . '/../fim-html.php'; ?>