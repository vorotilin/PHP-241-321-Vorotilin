<form name="form_add" method="post"> 
    <div class="column">
        <div class="add">
            <label>Фамилия</label> 
            <input required type="text" name="surname" placeholder="Фамилия" value="<?= isset($row['surname']) ? htmlspecialchars($row['surname']) : '' ?>">
        </div>
        <div class="add">
            <label>Имя</label> 
            <input type="text" name="name" placeholder="Имя" value="<?= isset($row['name']) ? htmlspecialchars($row['name']) : '' ?>">
        </div>
        <div class="add">
            <label>Отчество</label> 
            <input type="text" name="lastname" placeholder="Отчество" value="<?= isset($row['lastname']) ? htmlspecialchars($row['lastname']) : '' ?>">
        </div>
        <div class="add">
            <label>Пол</label> 
            <select name="gender">
                <option value="<?= isset($row['gender']) ? htmlspecialchars($row['gender']) : '' ?>"><?= isset($row['gender']) ? htmlspecialchars($row['gender']) : '' ?></option>
                <option value="мужской">мужской</option>
                <option value="женский">женский</option>
            </select>
        </div>
        <div class="add">
            <label>Дата рождения</label> 
            <input type="date" name="date" value="<?= isset($row['date']) ? htmlspecialchars($row['date']) : '' ?>">
        </div>
        <div class="add">
            <label>Телефон</label> 
            <input type="text" name="phone" placeholder="Телефон" value="<?= isset($row['phone']) ? htmlspecialchars($row['phone']) : '' ?>">
        </div>
        <div class="add">
            <label>Адрес</label> 
            <input type="text" name="location" placeholder="Адрес" value="<?= isset($row['location']) ? htmlspecialchars($row['location']) : '' ?>"> 
        </div>
        <div class="add">
            <label>Email</label> 
            <input type="email" name="email" placeholder="Email" value="<?= isset($row['email']) ? htmlspecialchars($row['email']) : '' ?>">
        </div>
        <div class="add">
            <label>Комментарий</label> 
            <textarea name="comment" placeholder="Краткий комментарий"><?= isset($row['comment']) ? htmlspecialchars($row['comment']) : '' ?></textarea>
        </div>

        <button type="submit"<?= isset($button) ? htmlspecialchars($button) : '' ?> name="button" class="form-btn"><?= isset($button) ? htmlspecialchars($button) : '' ?>Сохранить</button>
    </div>
</form>
