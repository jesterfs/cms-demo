$sql = "SELECT pages.id, subjects.menu_name, pages.menu_name, pages.position, pages.visible, pages.content FROM pages LEFT JOIN subjects ON pages.subject_id = subjects.id";
