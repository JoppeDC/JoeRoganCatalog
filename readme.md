# Joe Rogan Catalog
## What?
The Joe Rogan Catalog is a simple Symfony 4 project used to sync all episodes by Joe Rogan.
Currently all episode's get synced to a database, and they stay there. Just hanging around. 
The plan is to integrate some sort of frontend to this, maybe some data analytics etc.

## How?
In this project we use the **Google Data Api V3** to fetch the data we want using the **GuzzleHTTP** client.
The channel from which we grab the videos can easily be changed by passing a different Playlist ID to the `youtubeSync->syncPlaylist()` function.
The synced videos get saved to a database, ready for further use. I will add more datapoints in the future.

## Why?
When i'm bored i want to build stuff. Usually, i dont have any inspiration for projects, so it ends up being a boring project not even worth sharing.
This time, i came with the idea during the day, and built the first demo during that night. I have an entire plan (or small plan) for this project,
so i know it will keep me busy for some time.

## I want this!
If you want to run this project locally for yourself, thats possible.
I've included the **Docker Compose** file that i used so you can get setup in notime.

If you have no experience in symfony(4), check out their docs to get started. I'm not going into detail here.

- Setup your local enviroment (With the docker-compose or any other dev env)
- Prepare your database (Use doctrine to generate the scheme/database. I'm  not including migrations since its not yet a project thats running in production enviroment)
- You can now sync the videos using the 'youtube:sync-joe` command.



###### Built When Bored
