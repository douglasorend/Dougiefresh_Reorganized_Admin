[hr]
[center][color=red][size=16pt][b]DOUGIEFRESH'S REORGANIZED ADMIN AREA V1.1[/b][/size][/color]
[url=http://www.simplemachines.org/community/index.php?action=profile;u=253913][b]By Dougiefresh[/b][/url] => [url=http://custom.simplemachines.org/mods/index.php?mod=3973]Link to Mod[/url]
[/center]
[hr]

[color=blue][b][size=12pt][u]Introduction[/u][/size][/b][/color]
This mod makes a variety of changes to the Admin area in order to more logically order the mods installed into the Admin area.  Most were dumped into the [b]Configuration[/b] area by the mod authors, which was fine, but it creates a big mess that I really got tired off.

[color=blue][b][size=12pt][u]Admin Alterations[/u][/size][/b][/color]
> [b]Package Manager[/b] is now in its own section!
> [b]Search[/b] section was created, using the [b]Search[/b] area from [b]Configuration[/b] and [b]Search Engines[/b] from [b]Main[/b].
>>> If [url=http://custom.simplemachines.org/mods/index.php?mod=2659]Optimus Brave[/url] is installed, it is moved to the [b]Search[/b] area.
> [b]Security[/b] section has been created, using [b]Security and Moderations[/b] area from [b]Configurations[/b]
>>> [url=http://custom.simplemachines.org/mods/index.php?mod=2155]httpBL[/url], [url=http://custom.simplemachines.org/mods/index.php?mod=2815]Forum Firewall[/url] and [url=http://custom.simplemachines.org/mods/index.php?mod=2502]Bad Behavior[/url] have been moved to the [b]Security[/b] section
>>> If [url=http://custom.simplemachines.org/mods/index.php?mod=3907]SMF 2.1-style Admin Area[/url] is installed, the [b]Anti-Spam[/b] area is moved to the [b]Security[/b] section.
> [b]Configuration[/b] tab has been restored back to unmodified condition, with exception of [b]Security and Moderations[/b]
> Modifications now have a [b]Mods[/b] section, dedicated to everything that doesn't belong in [b]Configuration[/b]!
>>> [url=http://custom.simplemachines.org/mods/index.php?mod=3849]EMail Inactive Users[/url] has been moved to the [b]Maintenance[/b] area.
>>> [url=http://custom.simplemachines.org/mods/index.php?mod=189]Related Topics[/url] has been moved to the [b]Forums[/b] area.
>>> [url=http://custom.simplemachines.org/mods/index.php?mod=3708]Like Posts[/url] has been moved to the [b]Forums[/b] area.
>>> [url=http://custom.simplemachines.org/mods/index.php?mod=544]Akismet Spam Protection[/url] has been moved out of [b]Modifications Settings[/b] and placed under [b]Security[/b]
>>> [url=http://custom.simplemachines.org/mods/index.php?mod=3861]Mentions[/url] has has been moved out of [b]Modifications Settings[/b] and placed under [b]Forum[/b]
>>> [url=http://custom.simplemachines.org/mods/index.php?mod=3036]Block e-mail usernames[/url] has has been moved out of [b]Modifications Settings[/b] and placed under [b]Members[/b]
>>> All other modifications in the [b]Configuration[/b] tab were moved into a new [b]Mods[/b] section
> [b]Forum[/b] => [b]Calendar[/b] was moved to the [b]Configuration[/b] area.
> [b]Members[/b] => [b]Paid Subscriptions[/b] was moved to the [b]Configuration[/b] area.
> [url=http://custom.simplemachines.org/mods/index.php?mod=473]SMF Gallery[/url] area was merged with the [b]Mods[/b] area.
> [url=http://custom.simplemachines.org/mods/index.php?mod=2557]SimpleAds[/url] area was merged with the [b]Mods[/b] area.
> [url=http://custom.simplemachines.org/mods/index.php?mod=2322]SA Facebook Integration[/url] area was merged with the [b]Mods[/b] area.
> [b]Maintenance[/b] => [b]Reports[/b] was moved to the [b]Main[/b] area.
> [b]Attachments and Avatars[/b] section renamed to [b]Attachments[/b]
> [b]Attachments and Avatars[/b] => [b]Avatars Settings[/b] moved to [b]Members[/b] => [b]Avatars[/b]
>>> [b]Attachments and Avatars[/b] => [b]Browse Files[/b] => [b]Avatars[/b] moved to [b]Members[/b] => [b]Avatars[/b] => [b]Browse Files[/b]
>>> [url=http://custom.simplemachines.org/mods/index.php?mod=2665]Default Avatar[/url] options in [b]Modification Settings[/b] moved to [b]Members[/b] => [b]Avatars[/b] => [b]Miscellaneous[/b]
>>> [url=http://custom.simplemachines.org/mods/index.php?mod=3116]Avatar for Banned Members[/url] option in [b]Modification Settings[/b] moved to [b]Members[/b] => [b]Avatars[/b] => [b]Miscellaneous[/b]

[color=blue][b][size=12pt][u]Compatibility Notes[/u][/size][/b][/color]
This mod was tested on SMF 2.0.9, but should work on earlier versions of SMF 2.0.x.  SMF 1.x is not and will not be supported.

[color=blue][b][size=12pt][u]Other Notes[/u][/size][/b][/color]
The reorganization of the Admin menu takes place AFTER the processing of the hooks....

[url=http://custom.simplemachines.org/mods/index.php?mod=3907]SMF 2.1-style Admin Area[/url] should be installed prior to this mod.

This mod was part of the [url=http://www.simplemachines.org/community/index.php?topic=520847.0]Real Tabs for Admin & Moderator Menus[/url] mod (version 2.x line) and has been expanded upon.

This mod does not install any other mods in order to use, so if the specified mod is not installed, no menu change will be made.

[color=blue][b][size=12pt][u]Changelog[/u][/size][/b][/color]
[quote]
[b][u]v1.1 - December 2nd, 2014[/u][/b]
o Changed hook code back to original code edit in [b]Sources/Admin.php[/b]
o Removed [url=http://custom.simplemachines.org/mods/index.php?mod=2167]Team Page[/url] from the list of areas in the [b]Configuration[/b] section...

[b][u]v1.0 - November 7th, 2014[/u][/b]
o Initial Re-Release to the Public
[/quote]

[hr]
[url=http://creativecommons.org/licenses/by/3.0][img]http://i.creativecommons.org/l/by/3.0/80x15.png[/img][/url]
This work is licensed under a [url=http://creativecommons.org/licenses/by/3.0]Creative Commons Attribution 3.0 Unported License[/url]
