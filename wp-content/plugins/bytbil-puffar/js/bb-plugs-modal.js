/**
 * Created by ranbogmord on 2014-12-04.
 */
(function () {
    tinymce.PluginManager.add("bb_plugs_modal", function (editor) {
        editor.addButton("bb_plugs_modal", {
            text: "Infoga puff",
            icon: false,
            onclick: function () {
                editor.windowManager.open({
                    title: "Infoga puff",
                    body: [
                        {
                            type: "listbox",
                            name: "plugs",
                            label: "Puff",
                            "values": PLUGS
                        }
                    ],
                    onsubmit: function (e) {
                        editor.insertContent("[puff id='" + e.data.plugs + "']");
                    }
                });
            }
        });
    });
}());
