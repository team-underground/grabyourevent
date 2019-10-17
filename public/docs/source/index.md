---
title: API Reference

language_tabs:
- php
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://eventeefy.test/docs/collection.json)

<!-- END_INFO -->

#Events


Apis for managing events
<!-- START_594be8c9540192efb0119f5855b0bca7 -->
## All Events
Api for public listing of all the events

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://eventeefy.test/events", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL("http://eventeefy.test/events");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "uuid": "29581bd1-4f87-3fea-ba7a-b9a44f59448b",
        "event_name": "Facere et nostrum reprehenderit.",
        "event_slug": "facere-et-nostrum-reprehenderit-oct-31-2019",
        "artist_name": "Leatha Corwin",
        "event_description": "Deserunt tenetur et est deleniti natus illum suscipit nulla nesciunt magnam molestias totam possimus sed praesentium facilis quibusdam adipisci pariatur distinctio quia dolor nam corrupti dignissimos qui delectus aperiam dolores dolorem.",
        "optional_description": "Qui facilis sit est nostrum est asperiores et est aliquam ullam odit ut ullam amet voluptatem perferendis deserunt consectetur ab incidunt soluta adipisci veritatis quo.",
        "what_is_included": [
            "Necessitatibus",
            "perferendis",
            "omnis",
            "ut",
            "delectus."
        ],
        "event_location": "466 Rashad Freeway\nSouth Vivianneview, WA 13767-0701",
        "event_pincode": 730423,
        "event_district": "TEZ",
        "event_state": "Assam",
        "category_name": "EXHIBITIONS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Oct 31 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/29581bd1-4f87-3fea-ba7a-b9a44f59448b\/edit",
            "show": "http:\/\/eventeefy.test\/events\/facere-et-nostrum-reprehenderit-oct-31-2019"
        }
    },
    {
        "uuid": "13e9dad4-49b3-387a-9e49-f17db8474929",
        "event_name": "Totam voluptatem non et veniam hic sit distinctio aspernatur.",
        "event_slug": "totam-voluptatem-non-et-veniam-hic-sit-distinctio-aspernatur-nov-01-2019",
        "artist_name": "Mrs. Angie Hartmann",
        "event_description": "Voluptatem dolorem minima voluptate cum nesciunt nostrum quo voluptas pariatur rem et occaecati quam accusamus soluta est debitis officiis aspernatur molestiae nihil et enim eius asperiores rerum repellendus quis magni.",
        "optional_description": "Aut ipsam iusto incidunt omnis pariatur aut numquam voluptatem quia illum ducimus explicabo possimus dolorem repellendus quisquam eaque optio natus vitae quibusdam quisquam tenetur perspiciatis quas iure tenetur.",
        "what_is_included": [
            "Ab",
            "aut",
            "magni",
            "et",
            "ad",
            "non."
        ],
        "event_location": "31634 Kunze Cliffs Suite 716\nLake Zenaberg, OR 99814",
        "event_pincode": 734050,
        "event_district": "DBR",
        "event_state": "Manipur",
        "category_name": "PLAYS",
        "event_ticket_price": "Free",
        "event_formatted_date": null,
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/13e9dad4-49b3-387a-9e49-f17db8474929\/edit",
            "show": "http:\/\/eventeefy.test\/events\/totam-voluptatem-non-et-veniam-hic-sit-distinctio-aspernatur-nov-01-2019"
        }
    },
    {
        "uuid": "6fff2d83-964a-381b-9315-39ea6918a62f",
        "event_name": "Eius fugit nesciunt quia temporibus nisi vel cum assumenda.",
        "event_slug": "eius-fugit-nesciunt-quia-temporibus-nisi-vel-cum-assumenda-nov-03-2019",
        "artist_name": "Dr. Sonya Sipes II",
        "event_description": "Ipsum illo sit laudantium corporis quis et quo nulla perferendis illum minus assumenda accusantium eligendi quo impedit et alias dicta rerum quia dignissimos ut aut quis magnam voluptatibus et rerum.",
        "optional_description": "Cumque illo tempora doloribus ipsam facilis voluptatem beatae neque est dolores nam officia.",
        "what_is_included": [
            "Consequatur",
            "in",
            "sed",
            "hic",
            "quia",
            "voluptatibus",
            "natus",
            "atque",
            "nam",
            "ullam."
        ],
        "event_location": "94299 Borer Wells Suite 335\nEast Estrellaview, SC 79913",
        "event_pincode": 738009,
        "event_district": "GHY",
        "event_state": "Meghalaya",
        "category_name": "LEARNING",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 03 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/6fff2d83-964a-381b-9315-39ea6918a62f\/edit",
            "show": "http:\/\/eventeefy.test\/events\/eius-fugit-nesciunt-quia-temporibus-nisi-vel-cum-assumenda-nov-03-2019"
        }
    },
    {
        "uuid": "0694a81b-b0fb-3cf2-b81a-066e1fde77e0",
        "event_name": "Dolorem sapiente animi sint amet alias delectus eos.",
        "event_slug": "dolorem-sapiente-animi-sint-amet-alias-delectus-eos-nov-03-2019",
        "artist_name": "Alyce Powlowski",
        "event_description": "Totam et commodi facere et dolorum rerum asperiores aliquam animi maiores labore error ducimus eum inventore at similique sit quia dolores ratione ipsum eos velit odit odit veritatis et nam qui voluptatem sit qui quae odit.",
        "optional_description": "Voluptas iste dicta voluptas eos voluptatum distinctio delectus alias ut ex aspernatur a tempora quibusdam ipsa in molestiae velit fugit praesentium debitis deleniti.",
        "what_is_included": [
            "Est",
            "quia",
            "eveniet",
            "dolorum",
            "et",
            "aut",
            "non."
        ],
        "event_location": "765 Willms Dam Suite 873\nHoegerberg, CA 20958",
        "event_pincode": 760915,
        "event_district": "TEZ",
        "event_state": "Manipur",
        "category_name": "MUSIC",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 03 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/0694a81b-b0fb-3cf2-b81a-066e1fde77e0\/edit",
            "show": "http:\/\/eventeefy.test\/events\/dolorem-sapiente-animi-sint-amet-alias-delectus-eos-nov-03-2019"
        }
    },
    {
        "uuid": "071f961d-a565-3937-88c4-99e026bfb6f6",
        "event_name": "Veniam id recusandae similique sequi ut.",
        "event_slug": "veniam-id-recusandae-similique-sequi-ut-nov-04-2019",
        "artist_name": "Mr. Aurelio Braun I",
        "event_description": "Sunt aliquid dolorem veritatis quaerat provident veniam voluptatibus eos dolore sit omnis molestiae nobis excepturi repellat et delectus sit expedita enim repellat.",
        "optional_description": "Ipsum repellat delectus qui quisquam molestiae enim laboriosam eveniet quia suscipit ut voluptatum est pariatur iste aspernatur amet veniam enim accusantium sed id similique eum dolores.",
        "what_is_included": [
            "Minus",
            "tempora",
            "natus",
            "non",
            "quia",
            "et",
            "nesciunt",
            "qui",
            "incidunt",
            "id",
            "qui."
        ],
        "event_location": "8385 Toy Hill Apt. 932\nHermistonton, DC 46034-1590",
        "event_pincode": 785089,
        "event_district": "JRH",
        "event_state": "Assam",
        "category_name": "SPORTS",
        "event_ticket_price": "Free",
        "event_formatted_date": null,
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/071f961d-a565-3937-88c4-99e026bfb6f6\/edit",
            "show": "http:\/\/eventeefy.test\/events\/veniam-id-recusandae-similique-sequi-ut-nov-04-2019"
        }
    },
    {
        "uuid": "d0cad6f4-34c2-3d9f-a265-4ada48c2b813",
        "event_name": "Ea eos ipsam dignissimos odio temporibus quas repudiandae voluptate.",
        "event_slug": "ea-eos-ipsam-dignissimos-odio-temporibus-quas-repudiandae-voluptate-oct-26-2019",
        "artist_name": "Dereck Welch",
        "event_description": "Suscipit mollitia temporibus amet aperiam ut sapiente corporis sunt eum repudiandae mollitia nesciunt voluptatem et qui deserunt aperiam cumque incidunt totam facilis eveniet sed rerum dolore amet quas enim delectus aut dolores harum quod illum dignissimos voluptas perspiciatis.",
        "optional_description": "Aliquid explicabo magnam nostrum dolorem et laborum et voluptas ducimus qui assumenda ipsum.",
        "what_is_included": [
            "Nesciunt",
            "ipsa",
            "temporibus",
            "est",
            "consequatur",
            "dignissimos",
            "tempora",
            "quae."
        ],
        "event_location": "63177 Bergnaum Path\nPort Matteofurt, VT 59311",
        "event_pincode": 713501,
        "event_district": "TEZ",
        "event_state": "Assam",
        "category_name": "LEARNING",
        "event_ticket_price": "Free",
        "event_formatted_date": "Oct 26 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/d0cad6f4-34c2-3d9f-a265-4ada48c2b813\/edit",
            "show": "http:\/\/eventeefy.test\/events\/ea-eos-ipsam-dignissimos-odio-temporibus-quas-repudiandae-voluptate-oct-26-2019"
        }
    },
    {
        "uuid": "f45dcd30-1955-3117-836f-694e0d5b7b76",
        "event_name": "Est repellendus similique quod doloremque omnis et eum.",
        "event_slug": "est-repellendus-similique-quod-doloremque-omnis-et-eum-nov-04-2019",
        "artist_name": "Ms. Jenifer Morissette",
        "event_description": "Harum occaecati quo aut consequuntur exercitationem dolorum cumque ea iste adipisci veritatis doloremque quis laborum deserunt optio facere facere pariatur perspiciatis quod quo repudiandae vero tempora porro omnis molestiae officia.",
        "optional_description": "Eligendi numquam perspiciatis eaque illo quae porro dignissimos ut animi reiciendis veniam sunt ducimus.",
        "what_is_included": [
            "Consequatur",
            "error",
            "dolores",
            "velit."
        ],
        "event_location": "226 Wilford Field\nBrennonfort, ID 51098-2245",
        "event_pincode": 719156,
        "event_district": "JRH",
        "event_state": "Assam",
        "category_name": "CAREERS & BUSSINESS",
        "event_ticket_price": "Free",
        "event_formatted_date": null,
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/f45dcd30-1955-3117-836f-694e0d5b7b76\/edit",
            "show": "http:\/\/eventeefy.test\/events\/est-repellendus-similique-quod-doloremque-omnis-et-eum-nov-04-2019"
        }
    },
    {
        "uuid": "a3faa24d-19a5-323c-8a83-029578ea6607",
        "event_name": "Omnis laboriosam quis facere rerum error.",
        "event_slug": "omnis-laboriosam-quis-facere-rerum-error-nov-05-2019",
        "artist_name": "Frederic Reichert",
        "event_description": "Omnis et et est facilis est assumenda rem mollitia velit inventore numquam atque qui ipsum vel maiores eos ut suscipit ut rerum excepturi quasi corrupti qui veritatis consequatur repellendus qui architecto voluptas ea nihil quibusdam.",
        "optional_description": "Sunt a sed rerum labore et excepturi veritatis aliquam tempora quisquam dolore voluptatibus atque suscipit corporis voluptas.",
        "what_is_included": [
            "Sint",
            "autem",
            "non",
            "itaque",
            "eaque",
            "sint",
            "similique",
            "quo",
            "qui."
        ],
        "event_location": "325 Kirstin Way Suite 216\nNew Joshuah, NH 67811-5605",
        "event_pincode": 736030,
        "event_district": "TEZ",
        "event_state": "Manipur",
        "category_name": "CAREERS & BUSSINESS",
        "event_ticket_price": "Free",
        "event_formatted_date": null,
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/a3faa24d-19a5-323c-8a83-029578ea6607\/edit",
            "show": "http:\/\/eventeefy.test\/events\/omnis-laboriosam-quis-facere-rerum-error-nov-05-2019"
        }
    },
    {
        "uuid": "91f14106-027c-3813-be76-14faf4683f6a",
        "event_name": "Eum sequi qui distinctio voluptatem fuga ut ut.",
        "event_slug": "eum-sequi-qui-distinctio-voluptatem-fuga-ut-ut-nov-01-2019",
        "artist_name": "Brisa Cronin",
        "event_description": "Et consequatur ex velit quo et voluptatum aliquam et hic architecto autem voluptas fuga aperiam nam quia quas voluptas commodi et similique consectetur qui sit quas aperiam voluptatem velit beatae ullam ipsam provident qui hic.",
        "optional_description": "Et tempora ducimus eius repudiandae voluptas facilis quaerat aliquid id neque animi omnis.",
        "what_is_included": [
            "Ut",
            "illum",
            "aut",
            "deleniti",
            "optio",
            "molestiae",
            "placeat",
            "facere."
        ],
        "event_location": "583 Schmitt Expressway\nElissaburgh, PA 66238",
        "event_pincode": 743620,
        "event_district": "JRH",
        "event_state": "Assam",
        "category_name": "FOOD & DRINKS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 01 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/91f14106-027c-3813-be76-14faf4683f6a\/edit",
            "show": "http:\/\/eventeefy.test\/events\/eum-sequi-qui-distinctio-voluptatem-fuga-ut-ut-nov-01-2019"
        }
    },
    {
        "uuid": "3fa51f82-0612-3885-8c63-3c293815d3a2",
        "event_name": "Corrupti harum rerum voluptas dolorem mollitia a est rerum praesentium.",
        "event_slug": "corrupti-harum-rerum-voluptas-dolorem-mollitia-a-est-rerum-praesentium-nov-04-2019",
        "artist_name": "Abbey Mohr",
        "event_description": "Eos necessitatibus aut suscipit vero saepe non modi laudantium magni nisi aut non odio architecto dignissimos totam animi quos distinctio sapiente et laborum.",
        "optional_description": "Sint ratione et blanditiis nemo numquam atque voluptas nemo magni quia voluptatibus perferendis provident voluptas doloremque nemo hic a libero quam minus id modi unde aut reprehenderit facere.",
        "what_is_included": [
            "Atque",
            "voluptas",
            "est",
            "ratione",
            "ut",
            "aut",
            "rem",
            "sint",
            "voluptatem",
            "eius",
            "est",
            "autem",
            "ex."
        ],
        "event_location": "6755 Hoppe Club Suite 107\nWest Jennyfer, TN 75106",
        "event_pincode": 724629,
        "event_district": "TEZ",
        "event_state": "Meghalaya",
        "category_name": "EXHIBITIONS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 04 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/3fa51f82-0612-3885-8c63-3c293815d3a2\/edit",
            "show": "http:\/\/eventeefy.test\/events\/corrupti-harum-rerum-voluptas-dolorem-mollitia-a-est-rerum-praesentium-nov-04-2019"
        }
    },
    {
        "uuid": "68030a2f-1cbf-3779-a542-9eb32dd6d2fd",
        "event_name": "Amet sed quaerat temporibus maxime exercitationem quidem delectus in fugit.",
        "event_slug": "amet-sed-quaerat-temporibus-maxime-exercitationem-quidem-delectus-in-fugit-oct-30-2019",
        "artist_name": "Caterina Heidenreich",
        "event_description": "Voluptas itaque ipsum et rerum sint quaerat excepturi similique quae nobis architecto numquam vel dignissimos officiis odio dolores impedit nisi molestias molestiae error.",
        "optional_description": "Perferendis voluptate sit non illum reprehenderit est totam inventore molestiae laboriosam ducimus rem culpa maiores ducimus iusto sapiente itaque reprehenderit mollitia eos optio similique enim.",
        "what_is_included": [
            "Ut",
            "ad",
            "autem",
            "est",
            "non",
            "consequatur",
            "omnis",
            "facilis",
            "doloribus."
        ],
        "event_location": "549 Purdy Dam\nNew Chazchester, MO 74156",
        "event_pincode": 706524,
        "event_district": "DBR",
        "event_state": "Assam",
        "category_name": "SPORTS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Oct 30 - 11 Nov | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/68030a2f-1cbf-3779-a542-9eb32dd6d2fd\/edit",
            "show": "http:\/\/eventeefy.test\/events\/amet-sed-quaerat-temporibus-maxime-exercitationem-quidem-delectus-in-fugit-oct-30-2019"
        }
    },
    {
        "uuid": "9f8df2a1-a28c-3974-9a40-28bfea9313d2",
        "event_name": "Ut voluptatem quisquam nulla ut sit.",
        "event_slug": "ut-voluptatem-quisquam-nulla-ut-sit-nov-02-2019",
        "artist_name": "Mr. Kameron Frami Jr.",
        "event_description": "Natus nihil facilis commodi quo sed et quia iusto rem debitis est sapiente odit qui magnam reprehenderit eaque accusantium alias autem unde possimus temporibus ea eius laudantium fugit et eaque quae tenetur id deserunt voluptas est ut deserunt minima sed.",
        "optional_description": "Eaque quaerat ullam dolor quisquam rerum voluptatem tempore et non magni ducimus et soluta ad voluptas velit reprehenderit sed quidem sunt impedit velit mollitia est quibusdam nemo porro.",
        "what_is_included": [
            "Pariatur",
            "at",
            "explicabo",
            "asperiores",
            "consequatur",
            "sed",
            "architecto."
        ],
        "event_location": "728 Angelina Crossroad Apt. 553\nNorth Roxanne, DC 42234",
        "event_pincode": 746111,
        "event_district": "GHY",
        "event_state": "Assam",
        "category_name": "CAREERS & BUSSINESS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 02 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/9f8df2a1-a28c-3974-9a40-28bfea9313d2\/edit",
            "show": "http:\/\/eventeefy.test\/events\/ut-voluptatem-quisquam-nulla-ut-sit-nov-02-2019"
        }
    },
    {
        "uuid": "6c1f81fe-b50c-385e-857d-f406f2e93758",
        "event_name": "Omnis nihil omnis vel nesciunt.",
        "event_slug": "omnis-nihil-omnis-vel-nesciunt-nov-05-2019",
        "artist_name": "Hilma Mraz",
        "event_description": "Omnis rerum molestias atque aliquid laudantium quisquam ea laborum explicabo repellat et aliquam aperiam velit maiores ea et asperiores ut perferendis omnis reprehenderit ratione incidunt quidem cupiditate labore ex sit unde voluptate corrupti aut voluptatem eaque.",
        "optional_description": "Fugiat ab quia saepe at qui quos occaecati dolorem voluptate eligendi corporis architecto eos id tempora illo vel distinctio.",
        "what_is_included": [
            "Pariatur",
            "voluptatem",
            "qui",
            "unde",
            "enim",
            "sequi",
            "laborum",
            "aut",
            "sit",
            "at",
            "nulla",
            "facilis."
        ],
        "event_location": "253 Alan Court\nNoraburgh, KS 97490",
        "event_pincode": 706466,
        "event_district": "JRH",
        "event_state": "Manipur",
        "category_name": "LEARNING",
        "event_ticket_price": "Free",
        "event_formatted_date": null,
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/6c1f81fe-b50c-385e-857d-f406f2e93758\/edit",
            "show": "http:\/\/eventeefy.test\/events\/omnis-nihil-omnis-vel-nesciunt-nov-05-2019"
        }
    },
    {
        "uuid": "499c5524-7912-3a69-845f-3cf5300c234e",
        "event_name": "Quam quia consequuntur dolorem ratione id sint aliquam a.",
        "event_slug": "quam-quia-consequuntur-dolorem-ratione-id-sint-aliquam-a-nov-03-2019",
        "artist_name": "Eli Swift",
        "event_description": "Dolore tempora natus ut nobis et provident vel quo vel officiis blanditiis non quo quo accusantium dolor dolor est molestiae veritatis eligendi voluptatum consectetur soluta dolores accusamus aut sit maiores dignissimos quo.",
        "optional_description": "Qui culpa fugiat commodi voluptatem officiis temporibus odit sint omnis voluptas sunt delectus et in nihil veniam similique error earum numquam voluptas.",
        "what_is_included": [
            "Et",
            "excepturi",
            "dolor",
            "a."
        ],
        "event_location": "3588 Susana Park\nReichertchester, RI 40967-9547",
        "event_pincode": 796072,
        "event_district": "DBR",
        "event_state": "Assam",
        "category_name": "OUTDOOR & ADVENTURES",
        "event_ticket_price": "Free",
        "event_formatted_date": null,
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/499c5524-7912-3a69-845f-3cf5300c234e\/edit",
            "show": "http:\/\/eventeefy.test\/events\/quam-quia-consequuntur-dolorem-ratione-id-sint-aliquam-a-nov-03-2019"
        }
    },
    {
        "uuid": "b7e5be8f-92f0-3812-a44c-06dcce7c6621",
        "event_name": "Consequatur quis sunt aliquam velit eaque.",
        "event_slug": "consequatur-quis-sunt-aliquam-velit-eaque-nov-02-2019",
        "artist_name": "Akeem Fadel",
        "event_description": "Ut unde labore sed minima et non quia et id quia ipsa aliquam excepturi magnam enim iusto molestias vitae quam minus iste adipisci nobis molestiae illo eum porro quo porro odit nihil voluptatibus voluptatem unde sunt rerum exercitationem omnis a.",
        "optional_description": "Omnis laudantium blanditiis ut esse animi enim numquam sed sed hic sed ex quidem.",
        "what_is_included": [
            "Quisquam",
            "voluptatem",
            "maiores",
            "a",
            "molestiae."
        ],
        "event_location": "7586 McKenzie Light\nEast Emilside, NJ 65435-1903",
        "event_pincode": 792206,
        "event_district": "TEZ",
        "event_state": "Assam",
        "category_name": "OUTDOOR & ADVENTURES",
        "event_ticket_price": "Free",
        "event_formatted_date": null,
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/b7e5be8f-92f0-3812-a44c-06dcce7c6621\/edit",
            "show": "http:\/\/eventeefy.test\/events\/consequatur-quis-sunt-aliquam-velit-eaque-nov-02-2019"
        }
    },
    {
        "uuid": "2a80a134-f016-377a-a0be-3513444b7d99",
        "event_name": "Aliquid esse facilis libero ut quis quidem asperiores id enim sit.",
        "event_slug": "aliquid-esse-facilis-libero-ut-quis-quidem-asperiores-id-enim-sit-nov-04-2019",
        "artist_name": "Linda Dare",
        "event_description": "Suscipit voluptatem exercitationem ullam dolores placeat ex et at tempore officia natus doloremque necessitatibus voluptas ipsum et repellendus qui molestiae non ea alias reprehenderit a ut error omnis iusto minus qui voluptate voluptatem modi beatae in dolor amet aliquam provident dolor cumque alias.",
        "optional_description": "Vel sed rerum ipsam velit praesentium ut repudiandae consequatur qui eum ut est eaque ex autem perferendis nulla non aspernatur dolorem ad.",
        "what_is_included": [
            "Id",
            "facere",
            "iusto",
            "et",
            "corporis",
            "ut",
            "impedit."
        ],
        "event_location": "8178 Grant Highway\nPort Addiefurt, RI 78643-7928",
        "event_pincode": 737811,
        "event_district": "GHY",
        "event_state": "Assam",
        "category_name": "LEARNING",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 04 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/2a80a134-f016-377a-a0be-3513444b7d99\/edit",
            "show": "http:\/\/eventeefy.test\/events\/aliquid-esse-facilis-libero-ut-quis-quidem-asperiores-id-enim-sit-nov-04-2019"
        }
    },
    {
        "uuid": "1cae6e5f-5c9f-377e-b91b-7ed131bfbc20",
        "event_name": "Quas nulla repellat dolorem non consequatur sequi.",
        "event_slug": "quas-nulla-repellat-dolorem-non-consequatur-sequi-oct-27-2019",
        "artist_name": "Ressie Nicolas",
        "event_description": "Sit ex et quia ex magnam quos aliquid sequi quae voluptates aut illo recusandae nostrum qui suscipit possimus corporis qui architecto saepe qui qui id ea tempora quas sit fugit voluptates.",
        "optional_description": "Qui repellendus et consequuntur rerum delectus ut totam eum et fuga impedit ab.",
        "what_is_included": [
            "Voluptas",
            "rerum",
            "occaecati",
            "vel",
            "nostrum."
        ],
        "event_location": "65194 Heller Port Apt. 080\nAllenemouth, UT 04760-5713",
        "event_pincode": 735992,
        "event_district": "DBR",
        "event_state": "Assam",
        "category_name": "SPORTS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Oct 27 - 15 Nov | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/1cae6e5f-5c9f-377e-b91b-7ed131bfbc20\/edit",
            "show": "http:\/\/eventeefy.test\/events\/quas-nulla-repellat-dolorem-non-consequatur-sequi-oct-27-2019"
        }
    },
    {
        "uuid": "547b92b2-c0d6-3323-bb22-fd4079eddc9f",
        "event_name": "Id in corporis porro.",
        "event_slug": "id-in-corporis-porro-nov-02-2019",
        "artist_name": "Burdette Parisian III",
        "event_description": "Cum autem necessitatibus qui quia odit neque ea accusantium voluptas error ipsam vero asperiores est eum ad nihil et reiciendis sapiente maiores optio.",
        "optional_description": "Voluptas blanditiis est ipsam rem ut consectetur sunt commodi et est aperiam dolor sint id dolores nisi maiores tenetur dolore quibusdam ex.",
        "what_is_included": [
            "Cum",
            "totam",
            "eum",
            "labore."
        ],
        "event_location": "71005 O'Conner Path\nSouth Eraview, NM 51507-4947",
        "event_pincode": 776393,
        "event_district": "DBR",
        "event_state": "Manipur",
        "category_name": "CONCERTS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 02 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/547b92b2-c0d6-3323-bb22-fd4079eddc9f\/edit",
            "show": "http:\/\/eventeefy.test\/events\/id-in-corporis-porro-nov-02-2019"
        }
    },
    {
        "uuid": "d07a98df-5e02-3ae6-a414-45858279c836",
        "event_name": "Ad rerum deleniti ut.",
        "event_slug": "ad-rerum-deleniti-ut-nov-05-2019",
        "artist_name": "Juanita Boyle",
        "event_description": "Possimus eos dolor fugit voluptatem nobis sunt omnis est quasi sit molestiae nemo odio est temporibus totam voluptas ipsa in at et delectus voluptatem vitae voluptas et ducimus enim veniam tempora esse est vel molestiae iure est dolores voluptas.",
        "optional_description": "Eveniet ut est eaque molestiae eos minus sed debitis eaque qui quo dolore tenetur iste qui nihil aut cumque tempora quae reprehenderit explicabo reprehenderit labore ab.",
        "what_is_included": [
            "Laudantium",
            "et",
            "quia",
            "omnis",
            "voluptatem",
            "non",
            "et",
            "aut."
        ],
        "event_location": "73613 Kunze Trail\nNew Destiny, AZ 26064",
        "event_pincode": 705653,
        "event_district": "GHY",
        "event_state": "Assam",
        "category_name": "HEALTH & FITNESS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 05 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/d07a98df-5e02-3ae6-a414-45858279c836\/edit",
            "show": "http:\/\/eventeefy.test\/events\/ad-rerum-deleniti-ut-nov-05-2019"
        }
    },
    {
        "uuid": "065683f3-af37-3e5a-8e4a-8325d482dad9",
        "event_name": "Nobis necessitatibus enim consequuntur ipsa explicabo atque.",
        "event_slug": "nobis-necessitatibus-enim-consequuntur-ipsa-explicabo-atque-oct-30-2019",
        "artist_name": "Rowan Satterfield",
        "event_description": "Quisquam eius repellat modi beatae numquam inventore expedita modi minus tempora quia libero perspiciatis excepturi laudantium odio consequatur qui dolores doloremque consequatur.",
        "optional_description": "Incidunt similique ea fugiat ipsam consequuntur aut quasi eveniet nulla unde ut odio omnis itaque rerum ut vel repellendus molestiae qui aliquam enim provident minima eos aut culpa.",
        "what_is_included": [
            "Ipsa",
            "qui",
            "eos",
            "nemo",
            "qui",
            "eos."
        ],
        "event_location": "68068 Zulauf Landing Suite 721\nNew Ericstad, OK 93397",
        "event_pincode": 757304,
        "event_district": "TEZ",
        "event_state": "Assam",
        "category_name": "LEARNING",
        "event_ticket_price": "Free",
        "event_formatted_date": "Oct 30 - 11 Nov | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/065683f3-af37-3e5a-8e4a-8325d482dad9\/edit",
            "show": "http:\/\/eventeefy.test\/events\/nobis-necessitatibus-enim-consequuntur-ipsa-explicabo-atque-oct-30-2019"
        }
    },
    {
        "uuid": "40383fec-08a2-3816-81ca-1c45cf6017f9",
        "event_name": "Esse molestiae animi voluptatem atque quidem quo est.",
        "event_slug": "esse-molestiae-animi-voluptatem-atque-quidem-quo-est-oct-26-2019",
        "artist_name": "Prof. Edna Effertz IV",
        "event_description": "Aperiam commodi tenetur eos animi consequatur debitis et illum aliquam molestiae dicta commodi ratione provident blanditiis ut qui labore modi est aut quia enim accusamus iusto tenetur vel voluptas excepturi nesciunt aperiam velit architecto.",
        "optional_description": "Quam expedita excepturi eos quo ab ipsa hic atque nam sed commodi ea soluta libero dolorem vel doloremque libero.",
        "what_is_included": [
            "Ut",
            "beatae",
            "aliquid",
            "enim",
            "est",
            "blanditiis."
        ],
        "event_location": "4431 Dare Mountain Suite 273\nKacibury, NC 20054-3501",
        "event_pincode": 705274,
        "event_district": "DBR",
        "event_state": "Manipur",
        "category_name": "EXHIBITIONS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Oct 26 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/40383fec-08a2-3816-81ca-1c45cf6017f9\/edit",
            "show": "http:\/\/eventeefy.test\/events\/esse-molestiae-animi-voluptatem-atque-quidem-quo-est-oct-26-2019"
        }
    },
    {
        "uuid": "2c6a1dee-4768-35d2-90e2-cce790f1ff27",
        "event_name": "Provident fugiat natus debitis molestias et.",
        "event_slug": "provident-fugiat-natus-debitis-molestias-et-oct-29-2019",
        "artist_name": "Brian Beer DVM",
        "event_description": "At dolorem est veniam aut voluptate vel error ipsum eos suscipit corrupti vel excepturi in porro ipsum aut aut facere nihil ut placeat tempora asperiores sunt eum ut totam tempore dolor natus explicabo ipsa consequatur vel dolor et sit illo blanditiis.",
        "optional_description": "Assumenda excepturi est est aut eum vel quis natus itaque veritatis esse quas aliquam sint sit commodi sit voluptas dolores aut vero quas saepe harum totam sed.",
        "what_is_included": [
            "Qui",
            "vel",
            "aut",
            "eos",
            "quis",
            "dolorum",
            "est",
            "dolorum",
            "quibusdam",
            "id",
            "autem."
        ],
        "event_location": "17541 Kunze Burgs\nFlatleyton, OH 28270",
        "event_pincode": 790496,
        "event_district": "DBR",
        "event_state": "Meghalaya",
        "category_name": "CAREERS & BUSSINESS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Oct 29 - 14 Nov | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/2c6a1dee-4768-35d2-90e2-cce790f1ff27\/edit",
            "show": "http:\/\/eventeefy.test\/events\/provident-fugiat-natus-debitis-molestias-et-oct-29-2019"
        }
    },
    {
        "uuid": "77bcec26-43f7-34fa-a843-55e4fd87bdda",
        "event_name": "Provident magnam et fuga in consequuntur.",
        "event_slug": "provident-magnam-et-fuga-in-consequuntur-oct-28-2019",
        "artist_name": "Cicero Zemlak",
        "event_description": "Nemo in velit suscipit eligendi quia aspernatur molestiae reprehenderit dolores fuga dolorum omnis aspernatur repellendus nesciunt blanditiis et nam.",
        "optional_description": "Non facere deserunt praesentium enim incidunt consequatur delectus magnam placeat aut officiis atque qui sed dolorem iste cum corrupti sed adipisci exercitationem voluptatem corrupti est.",
        "what_is_included": [
            "Ut",
            "velit",
            "id",
            "fugiat",
            "officiis",
            "fuga."
        ],
        "event_location": "295 Haag Ridges\nLeramouth, MI 52438-7403",
        "event_pincode": 747095,
        "event_district": "JRH",
        "event_state": "Assam",
        "category_name": "ARTS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Oct 28 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/77bcec26-43f7-34fa-a843-55e4fd87bdda\/edit",
            "show": "http:\/\/eventeefy.test\/events\/provident-magnam-et-fuga-in-consequuntur-oct-28-2019"
        }
    },
    {
        "uuid": "dc04156f-b615-3b80-9ea3-affae4780e64",
        "event_name": "Asperiores est eum molestiae eveniet non voluptas.",
        "event_slug": "asperiores-est-eum-molestiae-eveniet-non-voluptas-nov-03-2019",
        "artist_name": "Krista Paucek",
        "event_description": "Non molestiae quo repellendus qui ut ab non fugit adipisci laboriosam dolorem corrupti in mollitia quaerat qui incidunt consequatur.",
        "optional_description": "Eos voluptas quas dolore amet qui porro eligendi et repellat dignissimos commodi facere unde ex repellendus.",
        "what_is_included": [
            "Beatae",
            "et",
            "qui",
            "eum",
            "sit."
        ],
        "event_location": "80451 John Spurs Suite 258\nLake Travisville, VT 30576",
        "event_pincode": 781243,
        "event_district": "JRH",
        "event_state": "Meghalaya",
        "category_name": "PLAYS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 03 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/dc04156f-b615-3b80-9ea3-affae4780e64\/edit",
            "show": "http:\/\/eventeefy.test\/events\/asperiores-est-eum-molestiae-eveniet-non-voluptas-nov-03-2019"
        }
    },
    {
        "uuid": "9ef37f8f-201a-3691-953a-22d6e41c0812",
        "event_name": "Cupiditate nulla in quisquam illum aut quia.",
        "event_slug": "cupiditate-nulla-in-quisquam-illum-aut-quia-oct-31-2019",
        "artist_name": "Donavon Will",
        "event_description": "Est nam non quas consequatur suscipit aliquid occaecati adipisci molestias neque eius corrupti quasi omnis velit sit facilis necessitatibus modi inventore quo in excepturi aut et omnis voluptas nihil ut ut necessitatibus.",
        "optional_description": "Autem ipsum quos temporibus architecto rerum culpa perspiciatis cupiditate et distinctio aperiam non quam quae aut delectus magni nisi sapiente ducimus ducimus harum fugit.",
        "what_is_included": [
            "Quidem",
            "et",
            "explicabo",
            "et",
            "et",
            "corporis",
            "est",
            "nobis."
        ],
        "event_location": "649 Wuckert Turnpike Suite 239\nNorth Clotildefurt, SD 06224",
        "event_pincode": 721127,
        "event_district": "TEZ",
        "event_state": "Meghalaya",
        "category_name": "EXHIBITIONS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Oct 31 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/9ef37f8f-201a-3691-953a-22d6e41c0812\/edit",
            "show": "http:\/\/eventeefy.test\/events\/cupiditate-nulla-in-quisquam-illum-aut-quia-oct-31-2019"
        }
    },
    {
        "uuid": "406730f8-d6e1-384b-adce-14dc7ec5cb29",
        "event_name": "Quas voluptate facilis voluptas eligendi autem libero.",
        "event_slug": "quas-voluptate-facilis-voluptas-eligendi-autem-libero-oct-28-2019",
        "artist_name": "Sunny Lueilwitz",
        "event_description": "Qui modi quia in distinctio omnis incidunt ea asperiores totam sit sit et id deserunt praesentium qui quaerat dolores nihil saepe officiis vero inventore corrupti facere aut soluta exercitationem nesciunt.",
        "optional_description": "Quisquam voluptatem aut voluptates est illo ipsam nostrum nobis veniam sequi voluptatem commodi ut nisi omnis facilis impedit.",
        "what_is_included": [
            "Aspernatur",
            "reprehenderit",
            "natus",
            "enim",
            "numquam",
            "eveniet."
        ],
        "event_location": "324 Hahn Creek Apt. 087\nLake Keithhaven, MT 83286-5298",
        "event_pincode": 731297,
        "event_district": "GHY",
        "event_state": "Manipur",
        "category_name": "MUSIC",
        "event_ticket_price": "Free",
        "event_formatted_date": "Oct 28 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/406730f8-d6e1-384b-adce-14dc7ec5cb29\/edit",
            "show": "http:\/\/eventeefy.test\/events\/quas-voluptate-facilis-voluptas-eligendi-autem-libero-oct-28-2019"
        }
    },
    {
        "uuid": "ab6c707f-fb20-3fc8-af60-5cc8430299ce",
        "event_name": "Et aspernatur velit animi est.",
        "event_slug": "et-aspernatur-velit-animi-est-nov-02-2019",
        "artist_name": "Louisa Stoltenberg",
        "event_description": "Iure debitis dolores debitis corrupti rerum consectetur nulla ut earum aut libero repellat officiis laborum adipisci fugiat consectetur totam tenetur repellat ut vel ea quisquam nesciunt sit nemo aut natus quia necessitatibus sint doloremque illo consequatur fugiat natus aut debitis error temporibus.",
        "optional_description": "Porro iusto voluptatum similique dolore itaque est odio iure non et qui qui illo quia et ea qui dolor eligendi rem nisi.",
        "what_is_included": [
            "Aut",
            "similique",
            "enim",
            "facilis",
            "adipisci",
            "ut",
            "reprehenderit",
            "labore",
            "beatae."
        ],
        "event_location": "993 Orpha Circle Apt. 149\nSouth Sammychester, AK 19216",
        "event_pincode": 790891,
        "event_district": "GHY",
        "event_state": "Manipur",
        "category_name": "SPORTS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 02 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/ab6c707f-fb20-3fc8-af60-5cc8430299ce\/edit",
            "show": "http:\/\/eventeefy.test\/events\/et-aspernatur-velit-animi-est-nov-02-2019"
        }
    },
    {
        "uuid": "1be2f631-0f03-36ad-b8e1-23d4cf8f9553",
        "event_name": "Tempora eius ducimus facere ab eum.",
        "event_slug": "tempora-eius-ducimus-facere-ab-eum-nov-01-2019",
        "artist_name": "Mrs. Cynthia Jast",
        "event_description": "Ullam aut in et soluta odio mollitia esse est at occaecati enim quia voluptatem enim sed eos quia omnis iusto inventore sint aut rem fuga voluptatum ea dicta iure soluta eos non.",
        "optional_description": "Veritatis perspiciatis veniam est distinctio placeat esse labore sit nam vel amet rerum iusto aut recusandae qui repudiandae.",
        "what_is_included": [
            "Suscipit",
            "quisquam",
            "enim",
            "tempora",
            "ut",
            "illo."
        ],
        "event_location": "511 Marie Circle\nToreyport, PA 70745-1697",
        "event_pincode": 799357,
        "event_district": "JRH",
        "event_state": "Assam",
        "category_name": "HEALTH & FITNESS",
        "event_ticket_price": "Free",
        "event_formatted_date": null,
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/1be2f631-0f03-36ad-b8e1-23d4cf8f9553\/edit",
            "show": "http:\/\/eventeefy.test\/events\/tempora-eius-ducimus-facere-ab-eum-nov-01-2019"
        }
    },
    {
        "uuid": "9e619734-8dea-3be7-81ae-00499bbfd368",
        "event_name": "Rerum ducimus quia est vitae illo et rerum.",
        "event_slug": "rerum-ducimus-quia-est-vitae-illo-et-rerum-nov-02-2019",
        "artist_name": "Mrs. Anabelle Conn",
        "event_description": "Temporibus dolor expedita aperiam repellendus aut voluptate maxime labore iure quas voluptate libero incidunt accusantium et consequuntur pariatur recusandae ad omnis exercitationem vel consequuntur in reiciendis magni quisquam ut eligendi laudantium autem.",
        "optional_description": "Quam id cumque totam aliquam ut ut sit aut sit dolorem qui magni blanditiis modi tempora quae sit dolor voluptatem sunt nihil.",
        "what_is_included": [
            "Blanditiis",
            "nostrum",
            "illo",
            "similique",
            "ullam",
            "ut",
            "sint",
            "qui",
            "ut",
            "ratione",
            "omnis",
            "iure",
            "commodi",
            "repellat",
            "inventore."
        ],
        "event_location": "71691 Maci Track\nAntoneside, MA 92234",
        "event_pincode": 799239,
        "event_district": "GHY",
        "event_state": "Assam",
        "category_name": "CONCERTS",
        "event_ticket_price": "Free",
        "event_formatted_date": null,
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/9e619734-8dea-3be7-81ae-00499bbfd368\/edit",
            "show": "http:\/\/eventeefy.test\/events\/rerum-ducimus-quia-est-vitae-illo-et-rerum-nov-02-2019"
        }
    },
    {
        "uuid": "b31d0d3a-a871-305e-b8ce-d14e0a14f6c3",
        "event_name": "Qui vel quia harum ut molestias non culpa suscipit.",
        "event_slug": "qui-vel-quia-harum-ut-molestias-non-culpa-suscipit-nov-03-2019",
        "artist_name": "Keaton Walsh I",
        "event_description": "Maiores aut repellat quae sed voluptatem harum omnis incidunt totam nulla quidem quae minus accusantium occaecati enim sit libero tempora rerum amet sapiente explicabo suscipit aut velit nisi inventore labore illum dignissimos voluptatibus vero pariatur.",
        "optional_description": "Et distinctio molestiae tempore voluptas optio vel quia ut aut ad quidem in possimus sapiente est consequatur enim natus ad cupiditate nihil esse vel qui dolorum ipsa cum.",
        "what_is_included": [
            "Voluptas",
            "dolores",
            "sequi",
            "omnis",
            "velit",
            "dolorum",
            "doloremque",
            "fuga."
        ],
        "event_location": "251 Veum Loaf\nPort Adelia, ND 05991",
        "event_pincode": 713465,
        "event_district": "JRH",
        "event_state": "Assam",
        "category_name": "ARTS",
        "event_ticket_price": "Free",
        "event_formatted_date": "Nov 03 | 12:00AM",
        "links": {
            "edit": "http:\/\/eventeefy.test\/events\/b31d0d3a-a871-305e-b8ce-d14e0a14f6c3\/edit",
            "show": "http:\/\/eventeefy.test\/events\/qui-vel-quia-harum-ut-molestias-non-culpa-suscipit-nov-03-2019"
        }
    }
]
```

### HTTP Request
`GET events`


<!-- END_594be8c9540192efb0119f5855b0bca7 -->

<!-- START_421dd5ccdba33e6e944a6d5f27b46bb3 -->
## Store A new Event
Api for storing a new event, only for admin and organiser

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://eventeefy.test/events/create", [
    'headers' => [
            "Content-Type" => "application/json",
        ],
    'json' => [
            "event_name" => "id",
            "category_id" => "4",
            "artist_name" => "Martin Garrix.",
            "event_description" => "consectetur",
            "optional_description" => "nam",
            "what_is_included" => "[&#039;asjkdhff&#039;, &#039;sadfjksadf&#039;, &#039;asdfsad&#039;]",
            "event_start_date" => "id",
            "event_end_date" => "fuga",
            "event_location" => "ea",
            "event_pincode" => "16",
            "event_district" => "officiis",
            "event_state" => "qui",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL("http://eventeefy.test/events/create");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "event_name": "id",
    "category_id": 4,
    "artist_name": "Martin Garrix.",
    "event_description": "consectetur",
    "optional_description": "nam",
    "what_is_included": "['asjkdhff', 'sadfjksadf', 'asdfsad']",
    "event_start_date": "id",
    "event_end_date": "fuga",
    "event_location": "ea",
    "event_pincode": 16,
    "event_district": "officiis",
    "event_state": "qui"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST events/create`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    event_name | string |  required  | The name of the event.
    category_id | integer |  required  | The category id of the event.
    artist_name | string |  required  | Artist of the event.
    event_description | string |  required  | Description of the event.
    optional_description | string |  optional  | Description of the event.
    what_is_included | Array |  required  | What is included with the event.
    event_start_date | date |  required  | Event start date.
    event_end_date | date |  optional  | Event end date.
    event_location | string |  required  | Venue of the event.
    event_pincode | integer |  required  | Pincode of the event venue.
    event_district | string |  required  | District where event is being held.
    event_state | string |  required  | State where event is being held.

<!-- END_421dd5ccdba33e6e944a6d5f27b46bb3 -->

<!-- START_68ae6aa1dc03260ebfb2d88b3d80626e -->
## Edit Event
Api for editing event, only for admin and organiser

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://eventeefy.test/events/29581bd1-4f87-3fea-ba7a-b9a44f59448b/edit", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL("http://eventeefy.test/events/29581bd1-4f87-3fea-ba7a-b9a44f59448b/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "uuid": "29581bd1-4f87-3fea-ba7a-b9a44f59448b",
    "event_name": "Facere et nostrum reprehenderit.",
    "event_slug": "facere-et-nostrum-reprehenderit-oct-31-2019",
    "artist_name": "Leatha Corwin",
    "event_description": "Deserunt tenetur et est deleniti natus illum suscipit nulla nesciunt magnam molestias totam possimus sed praesentium facilis quibusdam adipisci pariatur distinctio quia dolor nam corrupti dignissimos qui delectus aperiam dolores dolorem.",
    "optional_description": "Qui facilis sit est nostrum est asperiores et est aliquam ullam odit ut ullam amet voluptatem perferendis deserunt consectetur ab incidunt soluta adipisci veritatis quo.",
    "what_is_included": [
        "Necessitatibus",
        "perferendis",
        "omnis",
        "ut",
        "delectus."
    ],
    "event_location": "466 Rashad Freeway\nSouth Vivianneview, WA 13767-0701",
    "event_pincode": 730423,
    "event_district": "TEZ",
    "event_state": "Assam",
    "category_name": "EXHIBITIONS",
    "event_ticket_price": "Free",
    "event_formatted_date": "Oct 31 | 12:00AM",
    "links": {
        "edit": "http:\/\/eventeefy.test\/events\/29581bd1-4f87-3fea-ba7a-b9a44f59448b\/edit",
        "show": "http:\/\/eventeefy.test\/events\/facere-et-nostrum-reprehenderit-oct-31-2019"
    }
}
```

### HTTP Request
`GET events/{event}/edit`


<!-- END_68ae6aa1dc03260ebfb2d88b3d80626e -->

<!-- START_6b553f68f2eb33d557a90bbf73ed88fe -->
## Show Event
Api for publicly showing event details

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://eventeefy.test/events/facere-et-nostrum-reprehenderit-oct-31-2019", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL("http://eventeefy.test/events/facere-et-nostrum-reprehenderit-oct-31-2019");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "uuid": "29581bd1-4f87-3fea-ba7a-b9a44f59448b",
    "event_name": "Facere et nostrum reprehenderit.",
    "event_slug": "facere-et-nostrum-reprehenderit-oct-31-2019",
    "artist_name": "Leatha Corwin",
    "event_description": "Deserunt tenetur et est deleniti natus illum suscipit nulla nesciunt magnam molestias totam possimus sed praesentium facilis quibusdam adipisci pariatur distinctio quia dolor nam corrupti dignissimos qui delectus aperiam dolores dolorem.",
    "optional_description": "Qui facilis sit est nostrum est asperiores et est aliquam ullam odit ut ullam amet voluptatem perferendis deserunt consectetur ab incidunt soluta adipisci veritatis quo.",
    "what_is_included": [
        "Necessitatibus",
        "perferendis",
        "omnis",
        "ut",
        "delectus."
    ],
    "event_location": "466 Rashad Freeway\nSouth Vivianneview, WA 13767-0701",
    "event_pincode": 730423,
    "event_district": "TEZ",
    "event_state": "Assam",
    "category_name": "EXHIBITIONS",
    "event_ticket_price": "Free",
    "event_formatted_date": "Oct 31 | 12:00AM",
    "links": {
        "edit": "http:\/\/eventeefy.test\/events\/29581bd1-4f87-3fea-ba7a-b9a44f59448b\/edit",
        "show": "http:\/\/eventeefy.test\/events\/facere-et-nostrum-reprehenderit-oct-31-2019"
    }
}
```

### HTTP Request
`GET events/{event_slug}`


<!-- END_6b553f68f2eb33d557a90bbf73ed88fe -->

#general


<!-- START_7c1e0ac0639bb1be6ffd9043492c477a -->
## _ignition/health-check
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://eventeefy.test/_ignition/health-check", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL("http://eventeefy.test/_ignition/health-check");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _ignition/health-check`


<!-- END_7c1e0ac0639bb1be6ffd9043492c477a -->

<!-- START_e5f8cf3530eb18016c5b38d338c824a4 -->
## _ignition/execute-solution
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://eventeefy.test/_ignition/execute-solution", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL("http://eventeefy.test/_ignition/execute-solution");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST _ignition/execute-solution`


<!-- END_e5f8cf3530eb18016c5b38d338c824a4 -->

<!-- START_c7878c22064327a038e101c534d2690d -->
## _ignition/share-report
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://eventeefy.test/_ignition/share-report", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL("http://eventeefy.test/_ignition/share-report");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST _ignition/share-report`


<!-- END_c7878c22064327a038e101c534d2690d -->

<!-- START_022a636baa67209b79bda81cb8c2b0c5 -->
## _ignition/scripts/{script}
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://eventeefy.test/_ignition/scripts/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL("http://eventeefy.test/_ignition/scripts/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _ignition/scripts/{script}`


<!-- END_022a636baa67209b79bda81cb8c2b0c5 -->

<!-- START_f58213cd71dff813cecd421259a65e22 -->
## _ignition/styles/{style}
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("http://eventeefy.test/_ignition/styles/1", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL("http://eventeefy.test/_ignition/styles/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _ignition/styles/{style}`


<!-- END_f58213cd71dff813cecd421259a65e22 -->

<!-- START_23a979d5db96da5066c664e1925c4d41 -->
## events/{event}/buy
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("http://eventeefy.test/events/29581bd1-4f87-3fea-ba7a-b9a44f59448b/buy", [
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL("http://eventeefy.test/events/29581bd1-4f87-3fea-ba7a-b9a44f59448b/buy");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST events/{event}/buy`


<!-- END_23a979d5db96da5066c664e1925c4d41 -->


