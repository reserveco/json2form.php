{
    "icon"          :   "icon-group",
    "caption"       :   "New user registration",
    "description"   :   "Some help or interesting info about this project.",
    "name"          :   "register_form",
    "method"        :   "post",
    "id"            :   "profileForm",
    "action"        :   "registration.serverside.check.php",
    "target"        :   "_top",
    "class"         :   "additional-css-style-for-this-form",
    "autocomplete"  :   "off",
    "submit"        :   [
        {   "type":"button",    "value":"OK",       "class":"btn btn-primary",  "id":"btn1"  },
        {   "type":"reset",     "value":"Chancel",  "class":"btn btn-default",  "id":"btn2"  },
        {   "type":"submit",    "value":"Send",     "class":"btn btn-success",  "id":"btn3"  }
    ],
    "info": [
        {
            "label"     :   "E-mail",
            "input"     :   [{"type":"text", "value":"", "name":"email", "class":"FC required email"}]
        },
        {
            "label"     :   "Password",
            "input"     :   [{"type":"password", "value":"", "name":"pass", "class":"FC required pass"}]
        },
        {
            "label"     :   "Retype password",
            "input"     :   [{"type":"password", "value":"", "name":"repass", "class":"FC required repass"}]
        },
        {
            "label"     :   "SKYPE login",
            "input"     :   [{"type":"text", "value":"", "name":"skype", "class":"FC skype"}]
        },
        {
            "label"     :   "Name and surname",
            "input"     :   [{"type":"text", "value":"", "name":"fio", "class":"FC fio"}]
        },
        {
            "label"     :   "PromoCode",
            "input"     :   [{"type":"text", "value":"", "name":"promo", "class":"FC promo"}]
        },
        {
            "label"     :   "Bithday",
            "date"      :   [{ "name":"bdate", "value":"19.06.1984", "class":"form-control bdate required" }]
        }

    ]
}
