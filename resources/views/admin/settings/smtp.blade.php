<div class="mt-3"></div>

<?php
$values = json_decode(opt('smtp'));
?>
<input type="hidden" name="opt[smtp][status]" value="<?php echo $values->status; ?>" />
<?php
$inputs = ['Host', 'User', 'Pass', 'port' => 'Port'];
foreach ($inputs as $key => $title) {
$name = (is_int($key) ? Str::slug($title, '_', true) : $key);
?>
<div class="form-group row">
    <label class="col-2 col-form-label">{{ $title }}:</label>
    <div class="col-6">
        <input type="text" name="opt[smtp][{{ $name }}]" class="form-control" placeholder="{{ $title }}" value="{{ $values->{$name} }}">
    </div>
</div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
<?php
}
?>
