# music-stream-website
http://music-stream.azurewebsites.net

In this guide:
- [x] [Login](#login)
- [x] [Sign Up](#sign-up)
- [x] [Error Message](#error-message)
- [x] [User Center (Home)](#user-center-home)
- [x] [Recommendation Page (For You)](#recommendation-page-for-you)
- [x] [Keyword Searching](#keyword-searching)
- [x] [Playlist/Album Page](#playlistalbum-page)
- [x] [Multi-function Button](#multi-function-button)
- [x] [Mobile-friendly](#mobile-friendly)


## Login
<img width="824" alt="screen shot 2018-01-14 at 8 45 41 pm" src="https://user-images.githubusercontent.com/23438644/34923673-ef113d96-f96b-11e7-9942-abd80d38d093.png">

## Sign Up
<img width="824" alt="screen shot 2018-01-14 at 8 48 20 pm" src="https://user-images.githubusercontent.com/23438644/34923713-4ab8bb60-f96c-11e7-9496-361ba359d94d.png">

## Error Message
<img width="824" alt="screen shot 2018-01-14 at 9 00 04 pm" src="https://user-images.githubusercontent.com/23438644/34923921-0966e0a4-f96e-11e7-99b9-3686724e263d.png">
<img width="824" alt="screen shot 2018-01-14 at 8 51 39 pm" src="https://user-images.githubusercontent.com/23438644/34923772-de29b052-f96c-11e7-8c1c-c256856ecf9e.png">

When user clicks 'Join' button

- the initial check would happen at browser level, the browser would check if all the information are filled and if the email address meets the basic format
- then the input data would be trimmed and unusual content like html tag would be removed as well
- the clean data would be check at the font end again to see if the password meets requirement and if the passwords and email addresses match respectively
- finally the data would be sent to server side to check possible problems such as duplicate username or email
- then all the issues, which result in the failure of registration, will be summaried and sent back to user

## User Center (Home)
<img width="1286" alt="screen shot 2018-01-14 at 9 05 05 pm" src="https://user-images.githubusercontent.com/23438644/34923999-a383ba86-f96e-11e7-8eb0-4bac192f6637.png">

<img width="44" alt="screen shot 2018-01-14 at 9 57 58 pm" src="https://user-images.githubusercontent.com/23438644/34925231-0d9fbe7c-f976-11e7-9d1a-d312ce780d03.png">

- 'delete' button is used to drop song from playlist, delete playlist, unlike artist and unfollow user

<img width="44" alt="screen shot 2018-01-14 at 9 58 10 pm" src="https://user-images.githubusercontent.com/23438644/34925235-10d20ece-f976-11e7-8157-4bc725cbf1b9.png">

- 'add' button is used to create new playlist

<img width="44" alt="screen shot 2018-01-14 at 10 00 42 pm" src="https://user-images.githubusercontent.com/23438644/34925281-64931ada-f976-11e7-919f-a27ba92795dc.png">

- toggle button is used to set a playlist public to the others or not and it is public in default

## Recommendation Page (For You)
<img width="1283" alt="screen shot 2018-01-14 at 9 07 28 pm" src="https://user-images.githubusercontent.com/23438644/34924039-f5b47430-f96e-11e7-87e4-7f4d315b2f67.png">

- recent play is dynamically updated to display the most recently played 10 songs

## Keyword Searching
<img width="1268" alt="screen shot 2018-01-14 at 9 17 24 pm" src="https://user-images.githubusercontent.com/23438644/34924268-6ea0a462-f970-11e7-8f38-ae7773c181a8.png">

## Playlist/Album Page
<img width="1284" alt="screen shot 2018-01-14 at 9 21 15 pm" src="https://user-images.githubusercontent.com/23438644/34924369-ed202e16-f970-11e7-88cc-1ad28b7c2b0b.png">

- when current user visits playlist of the others, there won't be a red 'delete' button on the right

## Multi-function Button
<img width="81" alt="screen shot 2018-01-14 at 9 33 13 pm" src="https://user-images.githubusercontent.com/23438644/34924695-e7823664-f972-11e7-90e9-3a5017757315.png">

<img width="450" alt="screen shot 2018-01-14 at 9 33 45 pm" src="https://user-images.githubusercontent.com/23438644/34924706-f277437a-f972-11e7-9aa0-7b34f4b5edbb.png">

<img width="450" alt="screen shot 2018-01-14 at 9 38 41 pm" src="https://user-images.githubusercontent.com/23438644/34924753-58c2dedc-f973-11e7-86c9-617e999f7d2d.png">

- playlists that are owned by current user would be listed when 'Add to playlist' is clicked

<img width="450" alt="screen shot 2018-01-14 at 9 34 35 pm" src="https://user-images.githubusercontent.com/23438644/34924714-009d8f9a-f973-11e7-9b74-fcd6305a173a.png">

<img width="450" alt="screen shot 2018-01-14 at 9 35 10 pm" src="https://user-images.githubusercontent.com/23438644/34924721-0b944a2e-f973-11e7-95ab-6dd85d427950.png">

<img width="450" alt="screen shot 2018-01-14 at 9 35 24 pm" src="https://user-images.githubusercontent.com/23438644/34924726-14d53864-f973-11e7-8e25-c6583841802e.png">

- currently, each user is allowed to rate one specific track only once and the average rating reflects average result of all the users who have once rated this particular track

## Mobile-friendly
![wechatimg10](https://user-images.githubusercontent.com/23438644/34925491-a707fc2c-f977-11e7-8456-a488ece5fca7.jpeg)
![wechatimg9](https://user-images.githubusercontent.com/23438644/34925490-a57c9d36-f977-11e7-87f4-3348309bc2dd.jpeg)
