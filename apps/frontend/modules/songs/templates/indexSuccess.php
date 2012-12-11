<h1>song list</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Song title</th>
      <th>Song genre</th>
      <th>Song artist</th>
      <th>Song release date</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($songss as $songs): ?>
    <tr>
      <td><a href="<?php echo url_for('songs/show?id='.$songs->getId()) ?>"><?php echo $songs->getId() ?></a></td>
      <td><?php echo $songs->getSongTitle() ?></td>
      <td><?php echo $songs->getSongGenreId() ?></td>
      <td><?php echo $songs->getSongArtistId() ?></td>
      <td><?php echo $songs->getSongReleaseDate() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('songs/new') ?>">New</a>
