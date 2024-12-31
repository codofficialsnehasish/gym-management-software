<style>
    iframe {
      border: none;
      width: 100%;
      /* height: 600px; */
    }
  </style>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Data</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Drive Data</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>To share a Google Drive folder publicly:</p>
                        <ul>
                            <li>Open Google Drive and select the folder you want to share.</li>
                            <li>Right-click the folder and choose "Get Link".</li>
                            <li>Set the sharing settings to "Anyone with the link can view".</li>
                            <li>Copy the link and paste it below.</li>
                        </ul>
                        <?= form_open_multipart('data/process', 'class="row g-3 needs-validation" novalidate');?>
                        <div class="row mt-3">
                            <div class="mb-3 col-md-10">
                                <div>
                                    <input type="text" class="form-control" name="original_link" placeholder="Paste your Google Drive folder link" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                        <?= form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($links)): ?>
                        <h1>Google Drive Folder</h1>
                        <!-- <iframe 
                            src="https://drive.google.com/embeddedfolderview?id=1meU6vL3qy2wmROmmdo_sb0oBmXgjcZq9#grid">
                        </iframe>
                        <p>
                            <a href="https://drive.google.com/drive/folders/1meU6vL3qy2wmROmmdo_sb0oBmXgjcZq9?usp=sharing" target="_blank">
                            Open in Google Drive
                            </a>
                        </p> -->
                        <?php foreach ($links as $link): ?>
                        <iframe src="<?= generate_google_drive_embed_link($link->folder_id) ?>"></iframe>
                        <p>
                            <a href="<?= $link->original_link ?>" target="_blank">
                            Open in Google Drive
                            </a>
                        </p>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p>No links saved yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>