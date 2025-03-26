<?php
// Database connection
$dsn = 'sqlite:spotify.sqlite'; // SQLite database file for Spotify
$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to get count of all tracks in the database
function getTrackCount()
{
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM tracks");
    return $stmt->fetchColumn();
}

// Function to get count of tracks with the word 'you' in the title
function getTracksWithWordYou()
{
    global $pdo;
    $stmt = $pdo->query("SELECT Name FROM tracks WHERE Name LIKE '%you%'");
    return $stmt->fetchColumn();
}

// Function to get tracks that contain the word 'you' in the title
function getTracksWithWordYouList()
{
    global $pdo;
    $stmt = $pdo->query("SELECT Name FROM tracks WHERE Name LIKE '%you%'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get tracks that contain both 'you' and 'i' in the title
function getTracksWithWordsYouAndI()
{
    global $pdo;
    $stmt = $pdo->query("SELECT Name FROM tracks WHERE Name LIKE '%you%' AND Name LIKE '%i%'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get tracks from albums that contain 'chron' or 'vol' in the album name
function getTracksFromChronOrVolAlbums()
{
    global $pdo;
    // Use albums.Title instead of albums.name
    $stmt = $pdo->query("SELECT tracks.Name, albums.Title AS album_name 
                         FROM tracks 
                         JOIN albums ON tracks.AlbumId = albums.AlbumId 
                         WHERE tracks.Name LIKE '%you%' AND tracks.Name LIKE '%i%' 
                         AND (albums.Title LIKE '%chron%' OR albums.Title LIKE '%vol%')");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// Function to get artist names for tracks with 'you' and 'i' in the title from albums with 'chron' or 'vol'
function getArtistsForTracksWithWordsYouAndI()
{
    global $pdo;
    $stmt = $pdo->query("SELECT DISTINCT artists.Name AS artist_name 
                         FROM tracks 
                         JOIN albums ON tracks.AlbumId = albums.AlbumId
                         JOIN artists ON albums.ArtistId = artists.ArtistId
                         WHERE tracks.Name LIKE '%you%' AND tracks.Name LIKE '%i%' 
                         AND (albums.Title LIKE '%chron%' OR albums.Title LIKE '%vol%')");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to fetch playlists containing a specific song
function getPlaylistsForSong($songTitle) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT playlists.Name FROM playlists 
                           JOIN playlist_track ON playlists.PlaylistId = playlist_track.PlaylistId 
                           JOIN tracks ON playlist_track.TrackId = tracks.TrackId 
                           WHERE LOWER(tracks.Name) = LOWER(:songTitle)");
    $stmt->execute(['songTitle' => $songTitle]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to fetch playlists containing the song 'I Put a Spell on You'
function getPlaylistsForSongIPutASpellOnYou() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT Name FROM Playlists 
                           WHERE PlaylistId IN 
                           (SELECT DISTINCT PlaylistId FROM Tracks WHERE Name = 'I Put A Spell On You')");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



// Function to fetch tracks in a specific playlist
function getTracksInPlaylist($playlistName)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT tracks.title FROM tracks 
                           JOIN playlist_tracks ON tracks.id = playlist_tracks.track_id 
                           JOIN playlists ON playlist_tracks.playlist_id = playlists.id 
                           WHERE playlists.name = :playlistName");
    $stmt->execute(['playlistName' => $playlistName]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/directory.css">
    <link rel="stylesheet" type="text/css" href="/css/facade.css">
    <style>
        .chat-container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .chat-history {
            padding: 20px;
        }

        .message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 8px;
            clear: both;
        }

        .message.user {
            background-color: #e0f7fa;
            align-self: flex-end;
            float: left;
        }

        .message.bot {
            background-color: #f0f0f0;
            float: right;
        }

        .message .timestamp {
            font-size: 0.8em;
            color: #888;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <h1>Databases: queries</h1>

    <ul>
        <li>You wake up after a deep sleep. But something doesn't seem right. You can't feel your body. Strange... You look around, but the only thing you can see are 0s and 1s. Oh no! You woke up as an AI chatbot trained on the spotify.sqlite database!</li>

        <li>Wait, someone is talking to you...

            <div class="chat-container">
                <div class="chat-history">
                    <div class="message user">
                        Hello! Can you help me out? I need some information...
                        <div class="timestamp">10:01 AM</div>
                    </div>
                    <div class="message bot">
                        10100 00 1? W01r0 0m 1? Wh0r0 a0 I? Whe0e am I? Where am I? Wow... that was weird. Ehh, I don't know man. Who are you? I just woke up and I don't feel too well. What do you need?
                        <div class="timestamp">10:02 AM</div>
                    </div>
                    <div class="message user">
                        Jeez, these AI bots nowadays... I don't got time for this, alright. Anyway, listen, I'm looking for a song...
                        <div class="timestamp">10:03 AM</div>
                    </div>
                    <div class="message bot">
                        Ok... I'll need some more information than that. I can see <b><code><?php echo getTrackCount(); ?> songs</code></b> here...
                        <div class="timestamp">10:05 AM</div>
                    </div>
                    <div class="message user">
                        Well, it goes something like <i>wom, wom, wom, drumroll, takka, takka</i>
                        <div class="timestamp">10:07 AM</div>
                    </div>

                    <div class="message bot">
                        Ok, that's not really helping. Do you have something like a lyric?
                        <div class="timestamp">10:07 AM</div>
                    </div>

                    <div class="message user">
                        Well, it's a guy, and he screams. Like, really loud. Something like eh eh eh eh eh <i>youuuuu</i>
                        <div class="timestamp">10:08 AM</div>
                    </div>

                    <div class="message bot">
                        Ok, pff... let me have a look. I see <b><code><?php echo getTracksWithWordYou(); ?> songs containing the word 'you'</code></b>. Do you want me to repeat them to you?
                        <div class="timestamp">10:08 AM</div>
                    </div>

                    <div class="message user">
                        Sure...
                        <div class="timestamp">10:10 AM</div>
                    </div>

                    <div class="message bot">
                        Here you go:
                        <ul>
                            <?php
                            $tracksWithYou = getTracksWithWordYouList();
                            foreach ($tracksWithYou as $track) {
                                echo "<li>" . htmlspecialchars($track['Name']) . "</li>";
                            }
                            ?>
                        </ul>
                        <div class="timestamp">10:11 AM</div>
                    </div>

                    <div class="message user">
                        Still not helping. But I remember something else now. I first heard the song on an album that had 'vol' or 'chron' in the title.
                        <div class="timestamp">10:13 AM</div>
                    </div>

                    <div class="message bot">
                        Now we're getting somewhere. Vol or chron, ehh. Here you go:
                        <ul>
                            <?php
                            $tracksFromChronOrVol = getTracksFromChronOrVolAlbums();
                            foreach ($tracksFromChronOrVol as $track) {
                                echo "<li>" . htmlspecialchars($track['Name']) . " (" . htmlspecialchars($track['album_name']) . ")</li>";
                            }
                            ?>
                        </ul>
                        <div class="timestamp">10:14 AM</div>
                    </div>


                    <div class="message user">
                        Hm, still doesn't ring a bell. Do you also see the artist?
                        <div class="timestamp">10:14 AM</div>
                    </div>

                    <div class="message bot">
                        Ah, yeah, I see them.
                        <ul>
                            <?php
                            $artists = getArtistsForTracksWithWordsYouAndI();
                            foreach ($artists as $artist) {
                                echo "<li>" . htmlspecialchars($artist['artist_name']) . "</li>";
                            }
                            ?>
                        </ul>
                        <div class="timestamp">10:14 AM</div>
                    </div>

                    <div class="message user">
                        Can you just tell me the artists, not the songs?
                        <div class="timestamp">10:15 AM</div>
                    </div>

                    <div class="message bot">
                        No biggie.
                        <ul>
                            <?php
                            $artists = getArtistsForTracksWithWordsYouAndI();
                            foreach ($artists as $artist) {
                                echo "<li>" . htmlspecialchars($artist['artist_name']) . "</li>";
                            }
                            ?>
                        </ul>
                        <div class="timestamp">10:15 AM</div>
                    </div>

                    <div class="message user">
                        Yes! I remember it clearly now! It was looking for was <i>I put a spell on you</i>, by <i>CCR</i>! Wow, that's great. You're pretty good. Thanks man.
                        <div class="timestamp">10:16 AM</div>
                    </div>

                    <div class="message bot">
                        No worries. Anything else I can be of any assistance with, I'm here now anyway.
                        <div class="timestamp">10:16 AM</div>
                    </div>

                    <div class="message user">
                        Yeah, I'm looking for some similar music. Can you show me some playlists that have this song?
                        <div class="timestamp">10:17 AM</div>
                    </div>

                    <div class="message bot">
                        Oops, sorry, I felt a bit sick. I had to go to the garbage collector. I'm back now, let me have a look:
                        <ul>
                            <?php
                            $playlists = getPlaylistsForSongIPutASpellOnYou();
                            foreach ($playlists as $playlist) {
                                echo "<li><b>" . htmlspecialchars($playlist['Name']) . "</b></li>";
                            }
                            ?>
                        </ul>
                        <div class="timestamp">10:47 AM</div>
                    </div>


                    <div class="message user">
                        Can you list me the songs that are in the first playlist?
                        <div class="timestamp">10:47 AM</div>
                    </div>

                    <div class="message bot">
                        Here:
                        <p><code><b><?php echo htmlspecialchars("Show the name of the first playlist that contains the song 'I put a spell on you'"); ?></b></code></p>
                        <ol>
                            <li><code><b><?php
                                            $playlists = getPlaylistsForSong('I put a spell on you');
                                            $firstPlaylist = $playlists[0]['Name'];
                                            echo htmlspecialchars($firstPlaylist);
                                            ?></b></code></li>
                        </ol>
                        <div class="timestamp">10:47 AM</div>
                    </div>

                    <div class="message user">
                        Sweet, exactly what I needed. Alright, got to go. Take care man and make sure you drink enough water. Maybe you shouldn't drink so much next time. Just some friendly advice. Peace.
                        <div class="timestamp">10:47 AM</div>
                    </div>

                    <div class="message bot">
                        Peace brother ✌️
                        <div class="timestamp">10:48 AM</div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</body>

</html>