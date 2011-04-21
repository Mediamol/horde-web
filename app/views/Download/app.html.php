<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <h2><span>&nbsp;</span>Download <a href="<?php echo $this->urlWriter->urlFor('app', array('app' => $this->appname)) ?>"><?php echo $this->app_info['name'] ?></a></h2>
        <div class="section">
            <h3>Current Horde 4 Stable Release</h3>
            <?php if ($this->h4app): ?>
            <ul>
            <?php foreach ($this->h4app as $val): ?>
                <li><?php echo $val ?></li>
            <?php endforeach; ?>
            </ul>
            <p>Horde 4 and all Horde 4 applications now utilize a PEAR based
            installation method. You can install all Horde 4 applications and
            libraries by following the directions in the <a href="<?php echo
            $this->urlWriter->urlFor('app', array('app' => $this->appname,
            'action' => 'docs', 'f' => 'INSTALL.html')) ?>">documentation</a>.  You may
            also download the PEAR tarball from
            our <a href="http://pear.horde.org/">PEAR server</a> directly.</p>
            <?php else: ?>
            <p>No Horde 4 release at this time.</p>
            <?php endif;?>

            <h3>Current Horde 3 Stable Release</h3>
            <ul>
            <?php foreach ($this->stableapp as $val): ?>
                <li><?php echo $val ?></li>
            <?php endforeach; ?>
            </ul>

            <?php if (!empty($this->deprapp)): ?>
            <h3>Deprecated Release</h3>

            <ul>
            <?php foreach ($this->deprapp as $val): ?>
                <li><?php echo $val ?></li>
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <h3>Obtaining Current Development Versions</h3>

            <p>The current development version of
            <?php echo htmlspecialchars($this->app_info['name'])?> is available via
            <a href="../../source/snapshots.php">nightly snapshots</a> and our
            <a href="../../source/git.php">git repository</a>.</p>

            <?php if (count($this->devapp)): ?>
            <h3>Current Development Release</h3>
            <ul>
            <?php foreach ($this->devapp as $val): ?>
                <li><?php echo $val ?></li>
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <p>The H3 development version of
            <?php echo htmlspecialchars($this->app_info['name']) ?> is available via
            <a href="../../source/snapshots.php">nightly snapshots</a> and
            <a href="../../source/cvs.php">CVS</a>.</p>

            <?php if (count($this->app_info) > 1): ?>
            <h3>Obtaining Old Versions</h3>

            <p>Old versions can be obtained from our <a href="ftp://ftp.horde.org/pub/">FTP server</a>.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="rightcol" style="background: none;">
        <?php echo $this->render('releasedAppsList');?>
        <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>