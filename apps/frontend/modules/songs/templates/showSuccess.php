<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $songs->getId() ?></td>
    </tr>
    <tr>
      <th>Song title:</th>
      <td><?php echo $songs->getSongTitle() ?></td>
    </tr>
    <tr>
      <th>Song genre:</th>
      <td><?php echo $songs->getSongGenreId() ?></td>
    </tr>
    <tr>
      <th>Song artist:</th>
      <td><?php echo $songs->getSongArtistId() ?></td>
    </tr>
    <tr>
      <th>Song release date:</th>
      <td><?php echo $songs->getSongReleaseDate() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('songs/edit?id='.$songs->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('songs/index') ?>">List</a>
