<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Interface Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in the user interface.
    |
    */
    'money' => ['free' => 'ZDARMA'],
    'connection' => [
        'http' => [
            'lost' => 'Připojení k internetu bylo ztraceno.',
            'gained' => 'Připojení k internetu bylo obnoveno.'
        ],
        'websocket' => ['lost' => 'Připojení k chatu bylo ztraceno.', 'gained' => 'Připojení k chatu bylo obnoveno.']
    ],
    'error' => ['unknown' => 'Neznámá chyba.', 'image' => 'Chyba stažení obrázku.'],
    'form' => [
        'username' => 'Uživatelské jméno',
        'display_name' => 'Zobrazené jméno',
        'email' => 'E-mail',
        'login' => 'Uživatel',
        'password' => 'Heslo',
        'password_confirmation' => 'Heslo znovu',
        'file-select' => 'Vybrat soubor',
        'file-select-multiple' => 'Vybrat soubory',
        'file-select-listed' => 'Jeden soubor|:amount soubory|:amount souborů',
        'currency' => 'Měna',
        'extended' => [
            'offer-name' => 'Co prodáváte?',
            'offer-description' => 'Popište svoji nabídku trochu více',
            'offer-images' => 'Přidejte nějaké fotografie'
        ],
        'offer-name' => 'Název nabídky',
        'offer-description' => 'Popis nabídky',
        'price' => 'Cena',
        'offer-images' => 'Soubor',
        'reorder-images' => 'Přeskupte fotografie (přetáhnutím)',
        'password_change' => 'Nové heslo',
        'user-information' => 'Základní informace',
        'profile-image' => 'Profilový obrázek'
    ],
    'button' => [
        'profile' => 'Zobrazit profil',
        'login' => 'Přihlásit se',
        'remember-me' => 'Pamatovat si',
        'forgot-password' => 'Zapomněli jste heslo?',
        'register' => 'Registrovat se',
        'password-email' => 'Odeslat odkaz pro obnovení',
        'password-reset' => 'Obnovit heslo',
        'expand' => 'Zvětšit',
        'close' => 'Zavřít',
        'message' => 'Napsat zprávu',
        'ban' => 'Dát ban',
        'unban' => 'Očistit od banu',
        'report' => 'Nahlásit',
        'edit' => 'Upravit',
        'remove' => 'Smazat',
        'mark-appropriate' => 'Označit za vhodné',
        'bump' => 'Popostrčit jako nové',
        'bump-times' => '(zbylé: :times)',
        'previous' => 'Předchozí',
        'next' => 'Další',
        'browse' => 'Procházet',
        'publish' => 'Publikovat',
        'revert-images' => 'Obnovit původní fotografie',
        'resend' => 'Znovu',
        'send' => 'Odeslat',
        'language-toggle' => 'Přepnout jazyk',
        'offer-create' => 'Vytvořit novou nabídku',
        'chat' => 'Otevřít chat',
        'go-back' => 'Jít zpět',
        'top' => 'Jít nahoru',
        'images-loading' => 'Zkontrolovat znovu?',
        'buy' => 'Koupit',
        'search' => 'Hledat',
        'update-profile' => 'Aktualizovat profil',
        'clear-image' => 'Nenahrát žádnou fotku',
        'remove-profile-image' => 'Odstranit můj profilový obrázek úplně.'
    ],
    'hint' => [
        'login' => 'Přihlašovací jméno nebo e-mail',
        'type-message' => 'Napište zprávu',
        'empty_change' => 'Nechte prázdné, pokud nechcete měnit'
    ],
    'page' => [
        'login' => 'Přihlásit se',
        'register' => 'Registrovat se',
        'password-email' => 'Obnovit heslo',
        'password-reset' => 'Obnovit heslo',
        'offer-create' => 'Vytvořit nabídku',
        'offer-edit' => 'Upravit nabídku',
        'chat' => 'Chat',
        'banned' => 'Zabanovaní uživatelé',
        'admin' => 'Administrace',
        'reported' => 'Nahlášené nabídky',
        'offer' => 'Nabídka',
        'search' => 'Hledat',
        'dashboard' => 'Nástěnka',
        'me' => 'Můj profil',
        'logout' => 'Odhlásit se',
        'user-settings' => 'Moje nastavení'
    ],
    'confirm' => [
        'ban' => 'Jste si jist/a, že chcete dát ban uživateli :user?',
        'unban' => 'Jste si jist/a, že chcete očistit od banu uživatele :user?',
        'offer-remove' => 'Snažíte se smazat nabídku ":offer". Jste si jist/a, že chcete pokračovat?',
        'offer-bump' => 'Jste si jist/a, že chcete nabídku ":offer" popostrčit nahoru jako novou?',
        'offer-bump-times' => '{1} Toto můžete udělat už jen jednou.|{2} Toto můžete udělat celkem dvakrát.|[3,4] Máte k tomu celkem :times možnosti.|[5,*] Máte k tomu celkem :times možností.',
        'offer-report' => 'Jste si jist/a, že chcete nabídku ":offer" nahlásit jako nevhodnou?',
        'offer-mark-appropriate' => 'Jste si jist/a, že chcete nabídku ":offer" označit za vhodnou?',
        'form-leave' => 'Jste si jist/a, že chcete odejít? Máte neuložené změny!',
        'message' => 'Jste si jist/a, že chcete odeslat uživateli :user zprávu?'
    ],
    'notification' => [
        'before' => [
            'ban' => 'Banování uživatele :user.',
            'unban' => 'Čištení uživatele :user od banu.',
            'offer-remove' => 'Nabídka ":offer" je právě mazána.',
            'offer-bump' => 'Popostrkuji nabídku ":offer" nahoru.',
            'offer-report' => 'Nahlašování nabídky ":offer".',
            'offer-mark-appropriate' => 'Označování nabídky ":offer" za vhodnou.'
        ],
        'after' => [
            'ban' => 'Uživatel :user byl úspěšně zabanován.',
            'unban' => 'Uživatel :user byl úspěšně očištěn od banu.',
            'offer-remove' => 'Nabídka ":offer" byla úspěšně smazána.',
            'offer-bump' => 'Nabídka ":offer" byla úspěšně popostrčena.',
            'offer-report' => 'Nabídka ":offer" byla úspěšně nahlášena.'
        ],
        'messages' => 'Máte jednu novou zprávu.|Máte :amount nové zprávy.|Máte :amount nových zpráv.',
        'user-settings' => [
            'password' => [
                'success' => 'Heslo bylo úspěšně aktualizováno.',
                'failure' => 'Heslo se nepodařilo aktualizovat.'
            ],
            'image' => [
                'success' => 'Profilový obrázek byl úspěšně aktualizován. Změna se nemusí projevit ihned.',
                'failure' => 'Profilový obrázek se nepodařilo aktualizovat.'
            ],
            'success' => 'Profil byl úspěšně aktualizován.',
            'failure' => 'Profil se nepodařilo aktualizovat.'
        ]
    ],
    'notice' => [
        'bumps-none' => 'Již nelze popostrčit!',
        'bumped-recently' => 'Nedávno popostrčeno',
        'loading' => 'Načítání...',
        'message-failed' => 'Odeslání se nezdařilo.',
        'offer-reported' => 'Nahlášeno :timesx',
        'images-loading' => 'Ne všechny obrázky jsou ještě připraveny.',
        'list-end' => 'Dosáhl/a jste na konec.',
        'user-buy' => 'Uživatel :user chce něco koupit!'
    ],
    'label' => [
        'options' => [
            'additional' => 'Další možnosti',
            'owned' => 'Možnosti vlastníka',
            'admin' => 'Možnosti administrátora'
        ],
        'page-current' => '(zde se nacházíte)'
    ],
    'choices' => [
        'no-results' => 'Nic nenalezeno',
        'no-choices' => 'Žádné možnosti výběru',
        'select' => 'Stisknout pro výběr',
        'add' => 'Stiskněte Enter pro přidání ":value"',
        'max' => 'Lze přidat jen :max hodnot.'
    ],
    'message' => [
        'error' => 'Chyba',
        'received' => 'Přijato',
        'awaiting' => 'Čeká na odeslání',
        'read' => 'Přečteno',
        'sent' => 'Odesláno',
        'typing' => 'Píše...'
    ],
    'accessibility' => ['profile-img' => 'Profilový obrázek', 'offer-image' => 'Fotografie nabídky'],
    'offer' => ['draft' => 'Koncept', 'sold' => 'Prodáno', 'expired' => 'Vypršelo'],
];