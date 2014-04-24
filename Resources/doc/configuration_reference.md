### Configure your filesystems

The filesystem abstract layer permits you to develop your application without the need to know where your media will be stored and how. Another advantage of this is the possibility to update your files location without any impact on the code apart from the definition of your filesystem.

#### Example of Gaufrette Filesystem configuration

The following configuration is a local sample configuration for the KnpGaufretteBundle. It will create a filesystem service called `gaufrette.gallery_filesystem` which can be used in the MediaBundle. All the uploaded files will be stored in `/web/uploads` directory.


```php

# app/config/config.yml

knp_gaufrette:
    adapters:
        gallery:
            local:
                directory: %kernel.root_dir%/../web/uploads
                create: true

    filesystems:
        gallery:
            adapter: gallery
```
For a complete list of features refer to the [official documentation of GaufretteBundle](https://github.com/KnpLabs/KnpGaufretteBundle.git).

#### Configure your mappings

Pass the Gaufrette service `gaufrette.gallery_filesystem` configured in the previous step to the `storage_provider` property.

**Available rules :**

- **mime_types** : defines an array of valid mime types.
- **max_size** : defines the maximum allowed size of a media.
- **min_size** : defines the minimum allowed size of a media.
- **created_before** : defines if the media was created before this date.
- **created_after** : defines if the media was created after this date.

Notice that the value of *max_size* and *min_size* properties can only be expressed in **KB**, **MB**, **GB**, **TB** and **PB**.

```php

# app/config/config.yml

tms_media:
    storage_mappers:
        image:
            storage_provider: gaufrette.gallery_filesystem
            rules:
                mime_types: ['image/jpg', 'image/png', 'image/jpeg']
                max_size: 5MB
                min_size: 1MB
                created_before: 2014-08-14T12:00:00+0100
                created_after: 2014-07-14T21:00:00+0100
```