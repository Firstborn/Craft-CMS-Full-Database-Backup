(function($) {
    Craft.InsertDbBackup = Garnish.Base.extend({
        init: function (name, classHandle, optionsHtml, buttonLabel) {
            $existingDb = $('#tool-DbBackup');
            $list = $existingDb.closest('ul');
            $existingDb.replaceWith('<a id="tool-'+ classHandle +'" data-icon="database">' + name +'</a>');
            new Craft.Tool(classHandle, optionsHtml, buttonLabel);
         }
    });

})(jQuery);